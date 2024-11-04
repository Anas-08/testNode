<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'getLogin']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::view('/login', 'loginView');
Route::view('/profile', 'profileView');

Route::get('/dbconn', function () {
    return view('dbconnect');
});
