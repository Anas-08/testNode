<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', [UploadController::class, 'upload']);
Route::view('/upload', 'uploadView');

Route::get('/dbconn', function () {
    return view('dbconnect');
});
