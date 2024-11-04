<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentSimpleController extends Controller
{
    //
    function getStudentDataByQueryBuilder(){
        $data = DB::table('students')->where('course', 'mca')->get();
        return view('StudentSimpleView', ['data' => $data]);
    }

}
