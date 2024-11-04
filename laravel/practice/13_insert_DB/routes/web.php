<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('student', 'addStudent');
Route::post('student', [StudentController::class, 'insert']);
Route::get('studentDisp', [StudentController::class, 'get']);

Route::get('delete/{id}', [StudentController::class, 'delete']);

Route::get('edit/{id}', [StudentController::class, 'edit']);

Route::put('updateStudent/{id}', [StudentController::class, 'update']);

Route::get('search', [StudentController::class, 'search']);

Route::post('deleteMulti', [StudentController::class, 'deleteMultipleRecords']);

Route::get('/dbconn', function () {
    return view('dbconnect');
});
