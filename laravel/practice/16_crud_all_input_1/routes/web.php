<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;

Route::get('/', function () {
    return view('welcome');
});


// insert
Route::view('insert', 'insertView');
Route::post('insert', [DBController::class, 'insert']);

// display
// Route::view('dispData', 'displayView');
Route::get('dispData', [DBController::class, 'display']);

// delete
Route::get('delete/{id}', [DBController::class, 'delete']);

// edit and update
Route::get('edit/{id}', [DBController::class, 'edit']);
Route::post('edit/{id}', [DBController::class, 'update']);

// search
Route::get('search', [DBController::class, 'search']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});