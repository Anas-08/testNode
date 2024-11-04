<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    function getRoute(Request $req){
        return "get route method";
        // return $req;
    }

    function postRoute(Request $req){
        // return "post route method";
        echo  "Request method : ".$req->method();
        echo "<br>";
        echo  "Request Path : ".$req->path();
        echo "<br>";
        echo  "Request url : ".$req->url();
        echo "<br>";
        echo  "Name Parameter : ".$req->input('name');
        echo "<br>";
        echo  "Name Parameter with method : ".$req->name;
        echo "<br>"; 
        echo  "Input Parameter in form of Array : ";
        print_r($req->input());
        echo "<br>";
        echo "<br>";
        echo  "Input Parameter in form of Object : ";
        print_r($req->collect());
        echo "<br>";
        echo "<br>";
        echo "<br>";
        // return $req; 

        if($req->isMethod('post')){
            echo "execute for post request";
        }else{
            echo "execute for other request";

        }


    }

    function putRoute(){
        return "put route method";
    }
    function deleteRoute(){
        return "delete route method";
    }

    function anyRoute(){
        return "any route method";
    }

    function group1(){
        return "get & post method called";
    } 
    function group2(){
        return "put & delete method called";
    }
}
