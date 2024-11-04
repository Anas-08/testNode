<?php

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user/{id}', function($id){
//     return view('user',['id'=> $id]);
// });
// Route::view('/user', 'user');

Route::get('/user',function(){
    return view('user');
});

Route::view('/user', 'user');
Route::get('/user', [User::class, 'getUserName']);
Route::get('/user', [User::class, 'greetUser']);
Route::get('/user/{demo}', [User::class, 'welcomeUser']);


Route::get('/demo/{name}/{nested}', function($name, $nested){
    $demoVar = "testing variable";
    return view('demo', ['name'=> $name, 'demo'=>$demoVar, 'nested'=>$nested]);
});



Route::get('/dbconn', function () {
    return view('dbconnect');
});
