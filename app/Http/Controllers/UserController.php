<?php

namespace App\Http\Controllers;

use App\Repos\UserRepo;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function showRegister(): View
    {
        return view('contents.register');
    }

    public function showLogin(): View
    {
        return view('contents.login');
    }

    public function register(Request $request): RedirectResponse
    {
        $userData = [
            'name' => $request->input('registerName'),
            'email' => $request->input('registerEmail'),
            'password' => bcrypt($request->input('registerPassword'))
        ];

        $user = DB::transaction(function () use ($userData) {
            $user = $this->userRepo->registerUser($userData);
            Auth::login($user, true);

            return $user;
        });

        return redirect(route('show-profile'));
    }

    public function login(Request $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $request->input('loginEmail'), 'password' => $request->input('loginPassword')])) {
            Auth::logoutOtherDevices($request->input('loginPassword'));

            return redirect(route('show-profile'));
        } else {
            throw new Exception("There's no such user");
        }
    }

    public function logout(): RedirectResponse
    {
        $this->userRepo->clearRememberToken(Auth::user()->email);
        Auth::logout();

        return redirect(route('show-login'));
    }
}
