<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class HttpApi extends Controller
{
    //
    function getApiData(){
        // https://jsonplaceholder.typicode.com/todos/1
        $res = Http::get('https://jsonplaceholder.typicode.com/todos/1');
        $data = $res->body(); 
        return view('HttpApiView', ['data'=> json_decode($data)]);
    }
}
