<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'getStudent']);
Route::get('/api', [ApiController::class, 'getApiData']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
