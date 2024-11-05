<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatabaseModel; // importing Model (without query builder)

use Illuminate\Support\Facades\Storage; // for image

class DBController extends Controller
{
    // testing insert function 
    function insertTesting(Request $req){
        $data = new DatabaseModel();
        echo $data->name = $req->name;
        echo "<br>";
        echo $data->email = $req->email;
        echo "<br>";
        echo $data->password = $req->password;
        echo "<br>";
        echo $data->address = $req->address;
        echo "<br>";
        echo $data->gender = $req->gender;
        echo "<br>";
        echo $data->mobile = $req->mobile;
        echo "<br>";
        echo $data->course = $req->course;
        echo "<br>";

        // for hobbys (array to string)
        $hobbArray = $req->hobby;
        $hobb = implode(",", $hobbArray);
        echo $data->hobby = $hobb;
        echo "<br>";

        // for image
        // $img = $req->file('file')->store('public');
        $img = Storage::disk('public')->put('images', $req->file('file'));
        $imgArray = explode("/", $img); // array to strings
        $imgName = end($imgArray); // get last index
        echo $data->image = $imgName;
        echo "<br>";


        return "insert function called";
    }

    function insert(Request $req){
        $data = new DatabaseModel(); // instance of model class (DatabaseModel)
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = $req->password;  
        $data->address = $req->address;
        $data->gender = $req->gender;
        $data->mobile = $req->mobile;
        $data->course = $req->course;
        
        // for hobbys (array to string)
        $hobbArray = $req->hobby;
        $hobb = implode(",", $hobbArray);
        $data->hobby = $hobb;
        
        // for image
        // $img = $req->file('file')->store('public');
        $img = Storage::disk('public')->put('images', $req->file('file'));
        $imgArray = explode("/", $img); // array to strings
        $imgName = end($imgArray); // get last index
        $data->image = $imgName;
        
        $res = $data->save();
        if($res){
            return redirect('/');
        }
        
        // return "insert function called";
    }

    // delete function
    function delete($id){
        $res = DatabaseModel::destroy($id);

        if($res){
            return redirect('dispData');
        }
        // return $id;
    }

    // edit and update
    function edit($id){
        $data = DatabaseModel::find($id);
        return view('editView', ['data'=>$data]);
    }

    function update(Request $req, $id){
        $data = DatabaseModel::find($id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = $req->password;
        $data->mobile = $req->mobile;
        $data->address = $req->address;
        $data->gender = $req->gender;
        $data->course = $req->course;

        // for hobby
        $hobbyArray = $req->hobby;
        $hobb = implode(",", $hobbyArray);
        $data->hobby = $hobb;

        // for image
        if($req->hasFile('file')){
            if($data->image){
                Storage::disk('public')->delete('images/'.$data->images);
            }

            $img = Storage::disk('public')->put('images', $req->file('file'));
            $imgArray = explode("/", $img);
            $imgName = end($imgArray);

            $data->image = $imgName;
        }

        $res = $data->save();
        if($res){
            // return view('displayView', ['data'=> $data]);
            return redirect('dispData');
        }
    }


    // search
    function search(Request $req){
        $search = $req->search;
        $data = DatabaseModel::where('name', 'like', "%$search%")->get();
        return view('displayView', ['data'=>$data, 'search'=>$search]);
        // return "search function";
    }

    function display(){
        $data = DatabaseModel::all();
        return view('displayView', ['data'=> $data]);
        // return "display function called";
    }

}
