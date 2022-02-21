<?php

namespace App\Repos;

use App\Models\Market;
use Illuminate\Database\Eloquent\Collection;

class MarketRepo
{
    protected $market;

    public function __construct(Market $market)
    {
        $this->market = $market;
    }

    public function findOrFail(int $id)
    {
        return $this->market->findOrFail($id);
    }

    public function getAllListed(int $id): Collection
    {
        return $this->market->where('user_id', '!=', $id)->orderBy('created_at', 'asc')->get();
    }

    public function closeShop(int $id): void
    {
        $shop = $this->findOrFail($id);
        $shop->delete();
    }
}
