<?php

use App\Http\Controllers\formController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/test', 'test');
Route::view('/componentView', 'compView');
Route::view('/FormFiledView', 'formView');

Route::post('/handleFormInsert', [formController::class, 'handleFormInsert']);
Route::get('/dispFormData', [formController::class, 'SetUser']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
