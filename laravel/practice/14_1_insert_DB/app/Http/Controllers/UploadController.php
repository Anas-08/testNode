<?php

namespace App\Http\Controllers;

use App\Models\UploadImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    function uploadImg(Request $req){
        // $img = $req->file('file')->store('public');
        // $img = Storage::disk('public')->put('image', $req->file('file'));
        // $img = Storage::disk('public')->put('images', $req->file('file'));
        $img = Storage::disk('public')->put('images', $req->file('file'));
        // $img1 = $req->file('file')->store('public');

        $imgArrayName = explode('/', $img); 
        $imgName = $imgArrayName[1];

        $uploadImg = new UploadImg();
        $uploadImg->path = $imgName;
        $res = $uploadImg->save();

        if($res){
            return redirect('/');
            // return view('displayView');
        }
        return $imgName;
        // return "upload image function";
    }

    function displayImg(){
        //  $img = new UploadImg();
        //  $data = $img->all();
        $data = UploadImg::all();
        // return "display image function";
        // return $data;
        return view('displayView', ['data'=> $data]);
    }
}
