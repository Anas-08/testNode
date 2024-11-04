<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('upload', 'uploadView');
Route::post('upload', [UploadController::class, 'upload']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
