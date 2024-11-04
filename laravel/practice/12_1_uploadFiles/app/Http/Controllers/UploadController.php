<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //

    function upload(Request $req){
        $path = $req->file('file')->store('public');
        // $path = Storage::disk('public')->put('images', $req->file('image'));

        return $path;

        // return "upload function called";
    }
}
