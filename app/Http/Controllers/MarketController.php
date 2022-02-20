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
        $wallet = $this->walletRepo->getUserWallet();

        $shops = $this->marketRepo->getAllListed();

        $issuerData = $this->marketService->getIssuerWallet($shops);
        $consumerData = $this->marketService->getConsumerBalance($shops, $wallet);

        return view('contents.market', ['shops' => $shops, 'issuerData' => $issuerData, 'consumerData' => $consumerData]);
    }

    public function makeTrade(Market $shop, Request $request): RedirectResponse
    {
        $consumer = Auth::user();
        $quantity = $request->input('tradeQuantity');

        DB::transaction(function () use ($shop, $consumer, $quantity) {
            $this->historyRepo->createRecord($shop, $consumer, $quantity);
            $this->walletRepo->updateWallet($shop, $consumer, $quantity);
        });

        return redirect(route('show-profile', ['user' => $consumer]));
    }
}
