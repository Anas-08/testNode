<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Route::get('/about', function () {
//     return view('about');
// });

use App\Http\Controllers\UserController;
Route::get('/user',[UserController::class, 'getUser']);
Route::get('/getUser/{name}',[UserController::class, 'setName']);

Route::view('/about','about');
Route::redirect('/about','/');

Route::get('/contact/{name}', function ($name) {
    return view('contact',['name'=>$name]);
});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dbconn', function () {
    return view('dbconnect');
});
