<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('upload', 'uploadView');
Route::view('displayImg', 'displayView');

Route::post('upload', [UploadController::class, 'uploadImg']);
Route::get('displayImg', [UploadController::class, 'displayImg']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
