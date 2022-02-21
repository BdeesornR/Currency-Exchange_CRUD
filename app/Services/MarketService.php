<?php

namespace App\Services;

use App\Models\Wallet;
use App\Repos\WalletRepo;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Auth;

class MarketService
{
    protected $walletRepo;

    public function __construct(WalletRepo $walletRepo)
    {
        $this->walletRepo = $walletRepo;
    }

    public function getIssuerWallet(Collection $shops): array
    {
        $issuerData = [];

        $shops->each(function ($shop) use (&$issuerData) {
            $issuerName = $shop->user->name;
            $issuerWallet = $shop->wallet;
            $balanceFiat = $issuerWallet[$shop->currency_fiat];
            $balanceCrypto = $issuerWallet[$shop->currency_crypto];

            if ($shop->type === 'buy') {
                $quantity = $balanceFiat / $shop->price;
                $quantityFiat = $balanceFiat;
            } else if ($shop->type === 'sell') {
                $quantity = $balanceCrypto;
                $quantityFiat = $shop->price * $balanceCrypto;
            } else {
                throw new Exception('Transaction Type violation');
            }

            array_push($issuerData, ['name' => $issuerName, 'quantity' => $quantity, 'quantityFiat' => $quantityFiat]);
        });

        return $issuerData;
    }

    public function getConsumerBalance(Collection $shops, Wallet $consumerWallet): array
    {
        $consumerData = [];

        $shops->each(function ($shop) use (&$consumerData, $consumerWallet) {
            $balanceFiat = $consumerWallet[$shop->currency_fiat];
            $balanceCrypto = $consumerWallet[$shop->currency_crypto];

            if ($shop->type === 'buy') {
                $quantityFiat = $shop->price * $balanceCrypto;
            } else if ($shop->type === 'sell') {
                $quantityFiat = $balanceFiat;
            } else {
                throw new Exception('Transaction Type violation');
            }

            array_push($consumerData, ['quantityFiat' => $quantityFiat]);
        });

        return $consumerData;
    }
}
