<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function getLogin(Request $req){
        $req->session()->put('username', $req->input('name'));
        // return "run hona chaiye";
        // echo session('username');
        return redirect('profile');
    }

    function logout(){
        session()->pull('username');
        return redirect('login');
    }
}
