<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function getStudent(){
        $data = \App\Models\Student::all();
        return view('StudentView',['data'=> $data] );
    }
}
