<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentSimpleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/studentsSimple', [StudentSimpleController::class, 'getStudentDataByQueryBuilder']);
Route::get('/students', [StudentController::class, 'getStudentData']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
