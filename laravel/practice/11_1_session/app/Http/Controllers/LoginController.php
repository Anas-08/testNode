<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    function getLogin(Request $req){
        $req->session()->put('username', $req->input('name'));
        return redirect('profile');
    }

    function logout(){
        session()->pull('username');
        return redirect('login');
    }
}
