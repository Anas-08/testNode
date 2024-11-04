<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    function getUser(){
        return "<pre>Testing user controller class as routing</pre>";
    }
     function test1(){
        return "<h1>Second Function</h2>";
    } 
    
    function setName($name){
        return "<h1>Hello ". $name ."</h2>";
    }
}
