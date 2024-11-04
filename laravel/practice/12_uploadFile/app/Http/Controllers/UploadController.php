<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    function upload(Request $req){
        $path = $req->file('file')->store('public');
        $fileNameArray = explode("/", $path);
        $fileName = $fileNameArray[1];
        echo $fileName;
        echo "<br>";
        return $path;
        // return view('displayView', ['path'=> $fileName]);

    }
}
