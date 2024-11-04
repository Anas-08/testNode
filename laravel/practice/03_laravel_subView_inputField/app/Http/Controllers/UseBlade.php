<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UseBlade extends Controller
{
    //

    function getExample1(){
        $name = "testingVariable";
        $arr = ['test1', 'test2', 'test3', 'test4', 'test5'];

        return view('b1template', ['name'=>$name, 'arr'=>$arr]);
    }
}
