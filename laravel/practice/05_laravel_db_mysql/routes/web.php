<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', [UserController::class, 'users']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
