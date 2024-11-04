<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController1 extends Controller
{
    //
    function addUser(Request $req){
        echo "routes check";
        return $req;
        
    }


}
