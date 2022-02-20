<?php

namespace App\Repos;

use App\Models\Market;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class HistoryRepo
{
    public function getAllByUserId(User $user): Collection
    {
        return $user->histories()->get();
    }

    public function createRecord(Market $shop, User $consumer, string $quantity): void
    {
        $issuer = $shop->user;

        $issuer->histories()->create([
            'type' => $shop->type,
            'associated_id' => $consumer->id,
            'currency_crypto' => $shop->currency_crypto,
            'currency_fiat' => $shop->currency_fiat,
            'price' => $shop->price,
            'quantity' => $quantity,
        ]);

        $consumer->histories()->create([
            'type' => $shop->type === 'buy' ? 'sell' : 'buy',
            'associated_id' => $issuer->id,
            'currency_crypto' => $shop->currency_crypto,
            'currency_fiat' => $shop->currency_fiat,
            'price' => $shop->price,
            'quantity' => $quantity,
        ]);
    }
}