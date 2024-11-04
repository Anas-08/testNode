<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function getStudents(){
        // $stud = 
        $stud = \App\Models\Student::all();
        return  view('studentsView', ['students'=>$stud]);
    }
}
