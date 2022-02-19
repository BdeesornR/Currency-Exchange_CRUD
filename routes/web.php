<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UserController@showLogin');

Route::get('/register', 'UserController@showRegister')->name('show-register');
Route::post('/register', 'UserController@register')->name('register');

Route::get('/login', 'UserController@showLogin')->name('show-login');
Route::post('/login', 'UserController@login')->name('login');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', 'UserController@showUser')->name('show-user');
    Route::get('/market', 'UserController@showMarket')->name('show-market');
    Route::get('/history', 'UserController@showHistory')->name('show-history');
});
