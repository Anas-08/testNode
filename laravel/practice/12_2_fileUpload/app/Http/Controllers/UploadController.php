<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    function upload(Request $req){
        // $path = $req->file('file')->store('public');
        $path = Storage::disk('public')->put('images', $req->file('file'));
        $fileNameArray = explode("/", $path);
        $fileName = $fileNameArray[1];

        // return $path;
    echo $path;
        // echo "<br>";
        // print_r($fileNameArray);
        // echo "<br>";
        // echo $fileName;
        // echo "<br>";
        // return "upload function called";
        return view('displayView', ['path'=> $fileName]);
    }
}
