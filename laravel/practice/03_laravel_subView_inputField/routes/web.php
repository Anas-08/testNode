<?php

use App\Http\Controllers\FormController1;
use App\Http\Controllers\UseBlade;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
// Route::get('/user', function(){
//     return view('user');
// });
Route::get('/user/{name}', function($name = "test"){
    // $name = "test";
    return view('user', ['name'=> $name]);
});

Route::view('/about', 'about');

Route::get('user-home/{name}', [UserController::class, 'userHome']);
Route::get('user-about', [UserController::class, 'userAbout']);
Route::get('/admin-login', [UserController::class, 'adminLogin']);
// Route::get('/admin-signup', [UserController::class, 'adminLogin']);

Route::get('/blade-1', [UseBlade::class, 'getExample1']);

Route::view('/view-1', 'view1');
Route::view('/comp1', 'component1');
Route::view('/form1', 'form1');

Route::post('addUser', [FormController1::class, 'addUser']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
