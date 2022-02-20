<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repos\HistoryRepo;
use App\Repos\UserRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HistoryController extends Controller
{
    protected $historyRepo;
    protected $userRepo;

    public function __construct(HistoryRepo $historyRepo, UserRepo $userRepo)
    {
        $this->historyRepo = $historyRepo;
        $this->userRepo = $userRepo;
    }

    public function showHistory(): View
    {
        $user = Auth::user();
        $associatedName = collect();

        $histories = $this->historyRepo->getAllByUserId($user);

        $histories->each(function ($history, $index) use ($associatedName) {
            $associatedName->push($this->userRepo->getConsumerNameByID($history->consumer_id));
        });

        return view('contents.history', ['histories' => $histories, 'associatedName' => $associatedName]);
    }
}
