<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class userController extends Controller
{
    //
    function getUserUsingQueryBuilder(){
    //    echo "running";
        // $result = DB::table('users')->get();
        // $result = DB::table('users')->where('place', 'uski yaado mai')->get();

        // $insert = DB::table('users')->insert([
        //     'name' => 'test13',
        //     'email' => 'test13@gmail.com',
        //     'place' => 'galat famliy mai',
        // ]);
        // if($insert){
        //     return "Data inserted";
        // }else{
        //     return "Data not inserted"; 
        // }

        // print_r($result);
        // return view('UserView', ['data'=> $result]);
    }
}
