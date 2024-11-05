<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

use Illuminate\Support\Facades\Storage;

class StudController extends Controller
{
    //
    function insertStudent(Request $req){
        $stud = new Student();
        $stud->name = $req->name;
        $stud->address = $req->address;
        $stud->course = $req->course;
        $stud->mobile = $req->mobile;
        $stud->gender = $req->gender;

        $img = Storage::disk('public')->put('images', $req->file('file'));
        $imgArrayName = explode("/", $img);
        $imgToSave = $imgArrayName[1];

         $stud->image = $imgToSave;
// return $img;
        $res = $stud->save();
        if($res){
            return redirect("/");
        }

        // return $req->input();
        // return "insert function called";
        // return redirect('studentDisp');
    }

    function deleteStudent($id){
        // return "delete function called";
        $res = Student::destroy($id);
        if($res){
            return redirect('studentDisp');
        }
        // return $id;
    }

    function edit($id){
        $res = Student::find($id);
        
        return view('editStud', ['data'=> $res]);
    }

    function update(Request $req, $id){
        $stud = Student::find($id);
        $stud->name = $req->name;
        $stud->address = $req->address;
        $stud->course = $req->course;
        $stud->mobile = $req->mobile;
        $stud->gender = $req->gender;

        // for storing image (in this update situation we need to compulsory add a new img, 
        // else it will give error)

        // $img = Storage::disk('public')->put('images', $req->file('file'));
        // // $img1 = $req->file('file')->store('public');
        // $imgArrayName = explode("/", $img);
        // $imgName = $imgArrayName[1];
        // $stud->image = $imgName;

        // suppose we dont want to update img
        if($req->hasFile('file')){
            // delete old image
            if($stud->image){
                Storage::disk('public')->delete('images/'.$stud->image);
            }

            // to store new image
            $img = Storage::disk('public')->put('images', $req->file('file'));
            // $img1 = $req->file('file')->store('public');
            $imgArray = explode("/", $img);
            $imgName = end($imgArray); // last element

            $stud->image = $imgName;
        }

        $res = $stud->save();

        if($res){
            return redirect('studentDisp');
        }
        // return "update function called";
    }

    function search(Request $req){
        $search = $req->search;
        $students = Student::where('name','like', "%$search%")->get();   

        return view('dispStud', ['students'=>$students, 'search'=>$search]);

    }

    function display(){
        $students = Student::all();

        // {{-- use for pagination --}}
        // $students = Student::paginate(2);
        
        // return "display function called";

        return view('dispStud', ['students'=>$students]);
    }

}
