<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    function users(){
        $users = DB::select('select * from users');
        // return view('user');
        return view('user', ['user'=>$users]);
        // return "users function";
    }
}
