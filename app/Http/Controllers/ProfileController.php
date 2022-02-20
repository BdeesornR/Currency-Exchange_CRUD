<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repos\UserRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function showProfile(): View
    {
        $user = Auth::user();

        return view('contents.profile', ['user' => $user]);
    }
}
