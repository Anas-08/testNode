<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('upload', 'uploadView');
Route::get('imgDisp', 'displayView');

Route::post('upload', [UploadController::class, 'uploadImg']);
Route::post('imgDisp', [UploadController::class, 'displayImg']);


Route::get('/dbconn', function () {
    return view('dbconnect');
});
