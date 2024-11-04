<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    function getStudentData(){
        $data = Student::all();
        return view('StudentView', ['data' => $data]);
    }
}
