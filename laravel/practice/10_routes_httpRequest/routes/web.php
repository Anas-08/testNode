<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/userGet', [userController::class, 'getRoute']);
// Route::post('/userPost', [userController::class, 'postRoute']);
// Route::put('/userPut', [userController::class, 'putRoute']);
// Route::delete('/userDelete', [userController::class, 'deleteRoute']);

Route::get('/user', [userController::class, 'getRoute']);
Route::post('/user', [userController::class, 'postRoute']);
Route::put('/user', [userController::class, 'putRoute']);
Route::delete('/user', [userController::class, 'deleteRoute']);

// Route::get('/user', action: [userController::class, 'anyRoute']);
// Route::post('/user', [userController::class, 'anyRoute']);
// Route::put('/user', [userController::class, 'anyRoute']);
// Route::delete('/user', [userController::class, 'anyRoute']);

// Route::any('/user', [userController::class, 'anyRoute']);

// Route::match(['post', 'get'], "/user", [userController::class, 'group1']);
// Route::match(['delete', 'put'], "/user", [userController::class, 'group2']);

Route::view('/form', 'userView');
Route::view('/formAny', 'userView1');


Route::get('/dbconn', function () {
    return view('dbconnect');
});
