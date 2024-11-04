<?php

use App\Http\Controllers\HttpApi;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'getStudents']);

Route::get('/apiData',[HttpApi::class, 'getApiData']);


Route::get('/dbconn', function () {
    return view('dbconnect');
});
