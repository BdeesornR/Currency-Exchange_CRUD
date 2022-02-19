<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function showRegister(): View
    {
        return view('contents.register');
    }

    public function showLogin(): View
    {
        return view('contents.login');
    }

    public function showUser(): View
    {
        return view('contents.profile');
    }

    public function register(Request $request)
    {
        dd($request);
    }

    public function login(Request $request)
    {
        dd($request);
    }
}
