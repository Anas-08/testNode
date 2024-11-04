<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [userController::class, 'getUserUsingQueryBuilder']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
