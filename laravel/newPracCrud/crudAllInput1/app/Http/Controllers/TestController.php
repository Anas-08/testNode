<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // query builder
use App\Models\inputs;

class TestController extends Controller
{
    //
    function insert(Request $req){
        // echo "insert data";
        // echo $req->name;
        // echo "<br>";
        // echo $req->email;
        // echo "<br>";
        // echo $req->number;
        // echo "<br>";
        // echo $req->password;
        // echo "<br>";
        // echo $req->date;
        // echo "<br>";
        // echo $req->gender;
        // echo "<br>";
        
        // echo $req->address;
        // echo "<br>";
        // echo $req->course;
        // echo "<br>";
        // $hobb = implode(",", $req->hobby); 
        // // print_r($req->hobby);
        // echo $hobb;
        // echo "<br>";
        $data = new inputs();
        $data->name = $req->name;
        $data->email = $req->email;
        $data->number = $req->number;
        $data->password = $req->password;
        $data->dob = $req->date;
        $data->gender = $req->gender;
        $data->address = $req->address;
        $data->course = $req->course;

        $hobb = implode(",", $req->hobby); 
        $data->hobby = $hobb;

        $res = $data->save();
        if($res){
            return redirect('/home');
        }
        
    }

    function delete($id){
        $res = inputs::destroy($id);
        if($res){
            return redirect('/dispData');
        }
    }

    function edit($id){
        $data = inputs::find($id);
        return view('updateView', ['data'=>$data]);
    }

    function update(Request $req, $id){
        $data = inputs::find($id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->number = $req->number;
        $data->password = $req->password;
        $data->dob = $req->date;
        $data->gender = $req->gender;
        $data->address = $req->address;
        $data->course = $req->course;

        $hobb = implode(",", $req->hobby); 
        $data->hobby = $hobb;

        $res = $data->save();
        if($res){
            return redirect('/dispData');
        }  
    }

    function search(Request $req){
        $search = $req->search;
        $data = inputs::where('name', 'like', "%$search%")->get();
        return view('displayView', ['data'=>$data, 'search'=>$search]);

    }

    function display(){
        $data = inputs::all();
        return view('displayView', ['data'=>$data]);
    }
}
