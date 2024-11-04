<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    // 'https://jsonplaceholder.typicode.com/todos/1'
    function getApiData(){
        $res = Http::get('https://jsonplaceholder.typicode.com/todos/1');
        $data = $res->body();
        return view('ApiView', ['data'=> json_decode($data)]);
    }
}
