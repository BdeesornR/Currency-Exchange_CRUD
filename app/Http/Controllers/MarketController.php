<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MarketController extends Controller
{
    public function showMarket(): View
    {
        return view('contents.market');
    }
}
