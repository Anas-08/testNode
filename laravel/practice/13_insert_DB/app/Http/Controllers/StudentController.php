<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    function insert(Request $req){
        $stud = new Student();
        $stud->name = $req->name;
        $stud->email = $req->email;
        $stud->password = $req->password;
        $stud->save();

        if($stud){
            return view('welcome');
        }
        // return $req->input();
        // return "insert function called";
    }

    function get(){
        // $studData = Student::all();
        $studData = Student::paginate(5);
        return view('dispStudent', ['data'=> $studData]);
    }

    function delete($id){
        $isDeleted = Student::destroy($id);

        if($isDeleted){
            return redirect('studentDisp');
        }
    }

    function edit($id){
        // echo $id;
        $stud = Student::find($id);
        // return "edit function called";
        return view('updateStudent', ['data'=> $stud]);
    }

    function update(Request $req, $id){
        $stud = Student::find($id);
        $stud->name = $req->name;
        $stud->email = $req->email;
        $stud->password = $req->password;
        $res = $stud->save();
        if($res){
            return redirect('studentDisp');
        }
        // return "update functioni called";
    }

    function search(Request $req){
        $search =  $req->search;
        $stud = Student::where('name', 'like', "%$req->search%")->get();
        // return $stud;
        return view('dispStudent', ['data'=> $stud, 'search'=> $search]);
    }

    function deleteMultipleRecords(Request $req){
        // echo $req->ids;
        $res = Student::destroy($req->ids);
        // print_r( $req->ids);
        if($res){
            return redirect('studentDisp');
        }else{
            return "No record deleted";
        }
        // return "delete multiple records";
    }

}
