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
       return view('displayView', ['path'=> $fileName]);
        // return $path;
        // return "upload function upload";
    }
}
