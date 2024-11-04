<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
// use App\Http\Controllers\userController as ControllersUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'userView');
Route::post('/login', [UserController::class, 'getLogin']);

Route::view('profile', 'profileView');
Route::get('logout', [UserController::class, 'logout']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
