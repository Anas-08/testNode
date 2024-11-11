<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function(){
//     return view('home');
// });

// insert Data
Route::post('/insertData', [TestController::class, 'insert']);
Route::view('/insertData','insertView');

// display
Route::get('/dispData', [TestController::class, 'display']);

// delete
Route::get('/delete/{id}', [TestController::class, 'delete']);

// edit & update
Route::get('/edit/{id}', [TestController::class, 'edit']);
Route::post('/edit/{id}', [TestController::class, 'update']);

// search
Route::get('/search', [TestController::class, 'search']);

Route::view('/home', 'home');

