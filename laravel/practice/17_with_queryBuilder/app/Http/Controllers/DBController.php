<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // for image

use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    //
    function insert(Request $req){
        // for image
        // $img1 = $req->file('file')->store('public');
        $img = Storage::disk('public')->put('images', $req->file('file'));
        $imgArray = explode("/", $img);
        $imgName = end($imgArray);

        // for hobby
        $hobbyArray = $req->hobby;
        $hobbyName = implode(",", $hobbyArray);

        // insert query
        $res = DB::table('inputs1')->insert([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'address' => $req->address,
            'gender' => $req->gender,
            'mobile' => $req->mobile,
            'course' => $req->course,
            'hobby' => $hobbyName,
            'image' => $imgName,

        ]);

        if($res){
            return redirect("/");
        }

        // return "insert function called";
    }

    // delete
    function delete($id){
        $res = DB::table('inputs1')->where('id', $id)->delete();
        if($res){
            return redirect('dispData');
        }        
    }

    // edit and delete
    function edit($id){
        $data = DB::table('inputs1')->find($id);
        return view('editView', ['data'=>$data]);
    }

    function update(Request $req, $id){
        $data = DB::table('inputs1')->where('id',$id)->first();
        $imgName = $req->image;
        if($req->hasFile('file')){
            if($data->image){
                Storage::disk('public')->delete('images/'.$data->image);
            }
            $img = Storage::disk('public')->put('images', $req->file('file'));
            $imgArray = explode("/", $img);
            $imgName = end($imgArray);
        }

        $hobbyName = $req->hobby;
        $hobb = implode(",", $hobbyName);

        $res = DB::table('inputs1')->where('id',$id)->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'address' => $req->address,
            'gender' => $req->gender,
            'mobile' => $req->mobile,
            'course' => $req->course,
            'hobby' => $hobb,
            'image' => $imgName,

        ]);

        if($res){
            return redirect("dispData");
        }
    }

    function display(){
        $res = DB::table('inputs1')->get();

        return view('displayView', ['data'=>$res]);
        // return "display function called";
    }
}
