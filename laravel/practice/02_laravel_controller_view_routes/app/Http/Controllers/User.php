<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    //
    function getUserName(){
        return "Hi from controller...";
    }

    function greetUser(){
        return "welcome to my page";
    }

    function welcomeUser($anything){
        // return "Welcome ,".$name;
        echo $anything;
        return view('test', ['name'=>$anything]);
    }

}
