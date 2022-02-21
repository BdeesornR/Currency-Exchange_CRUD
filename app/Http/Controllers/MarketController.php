<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Repos\HistoryRepo;
use App\Repos\MarketRepo;
use App\Repos\WalletRepo;
use App\Services\MarketService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MarketController extends Controller
{
    protected $marketRepo;
    protected $walletRepo;
    protected $historyRepo;
    protected $marketService;

    public function __construct(
        MarketRepo $marketRepo,
        WalletRepo $walletRepo,
        HistoryRepo $historyRepo,
        MarketService $marketService
    ) {
        $this->marketRepo = $marketRepo;
        $this->walletRepo = $walletRepo;
        $this->historyRepo = $historyRepo;
        $this->marketService = $marketService;
    }

    public function showMarket(): View
    {
        $user = Auth::user();

        $wallet = $this->walletRepo->getUserWallet();
        $shops = $this->marketRepo->getAllListed($user->id);

        $issuerData = $this->marketService->getIssuerWallet($shops);
        $consumerData = $this->marketService->getConsumerBalance($shops, $wallet);

        return view('contents.market', ['shops' => $shops, 'issuerData' => $issuerData, 'consumerData' => $consumerData]);
    }

    public function makeTrade(Request $request): RedirectResponse
    {
        $shop = $this->marketRepo->findOrFail($request->input('shop'));

        $consumer = Auth::user();
        $quantity = $request->input('tradeQuantity');
        $availableFiat = $request->input('maxFiat');

        if ($quantity > $availableFiat) {
            $quantity = $availableFiat;
        }

        DB::transaction(function () use ($shop, $consumer, $quantity) {
            $this->historyRepo->createRecord($shop, $consumer, $quantity);
            $this->walletRepo->updateWallet($shop, $consumer, $quantity);
        });

        $issuer = $shop->wallet()->first();

        if ($issuer->{$shop->currency_fiat} <= 0.1 || $issuer->{$shop->currency_crypto} <= 0.000001) {
            $this->marketRepo->closeShop($shop->id);
        }

        return redirect(route('show-profile', ['user' => $consumer]));
    }
}
