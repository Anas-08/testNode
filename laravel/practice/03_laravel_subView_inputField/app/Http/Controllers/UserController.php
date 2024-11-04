<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    //

    function userHome($name){
        echo "user called with route controller";
        return view('user', ['name'=>$name]);
    }

    function userAbout(){
        echo "about called with route controller";
        return view('about');
    }
    
    function adminLogin(){
        if(View::exists('admin.login1')){
            echo "admin login called with route controller";
            return view('admin.login');
        }else{
            echo "No route/view Found";

        }
    }

}
