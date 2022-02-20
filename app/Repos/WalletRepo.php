<?php

namespace App\Repos;

use App\Models\Market;
use App\Models\User;
use App\Models\Wallet;
use Exception;
use Illuminate\Support\Facades\Auth;

class WalletRepo
{
    protected $wallet;

    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public function getUserWallet(): Wallet
    {
        $user = Auth::user();

        return $user->wallet;
    }

    public function createNewWallet(User $user): void
    {
        $user->wallet()->create([
            'thb' => 1000000.00,
            'usd' => 1000000.00,
            'btc' => 0.00112233,
            'eth' => 0.00112233,
            'xrp' => 0.00112233,
            'doge' => 0.00112233,
        ]);
    }

    public function updateWallet(Market $shop, User $consumer, string $qty): void
    {
        $issuerWallet = $shop->wallet;
        $consumerWallet = $consumer->wallet;

        $quantity = number_format($qty, 2, '.', '');
        $cryptoQuantity = number_format($quantity / $shop->price, 8, '.', '');

        if ($shop->type === 'buy') {
            $issuerWallet->{$shop->currency_crypto} = $issuerWallet->{$shop->currency_crypto} + $cryptoQuantity;
            $issuerWallet->{$shop->currency_fiat} = $issuerWallet->{$shop->currency_fiat} - $quantity;
            $issuerWallet->save();

            $consumerWallet->{$shop->currency_crypto} = $consumerWallet->{$shop->currency_crypto} - $cryptoQuantity;
            $consumerWallet->{$shop->currency_fiat} = $consumerWallet->{$shop->currency_fiat} + $quantity;
            $consumerWallet->save();
        } else if ($shop->type === 'sell') {
            $issuerWallet->{$shop->currency_crypto} = $issuerWallet->{$shop->currency_crypto} - $cryptoQuantity;
            $issuerWallet->{$shop->currency_fiat} = $issuerWallet->{$shop->currency_fiat} + $quantity;
            $issuerWallet->save();

            $consumerWallet->{$shop->currency_crypto} = $consumerWallet->{$shop->currency_crypto} + $cryptoQuantity;
            $consumerWallet->{$shop->currency_fiat} = $consumerWallet->{$shop->currency_fiat} - $quantity;
            $consumerWallet->save();
        } else {
            throw new Exception('Transaction Type Violation');
        }
    }
}