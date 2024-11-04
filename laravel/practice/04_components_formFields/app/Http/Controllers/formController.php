<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    //
    private $name;
    private $email;
    private $number;
    private $address;
    private $gender;
    private $course;
    private $hobby;
    
    function handleFormInsert(Request $req){
        $req->validate([
            'name' => 'required | min:3 | max:10',
            'email' => 'required | email',
            'number' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'course' => 'required',
            'hobby' => 'required',
        ], [
            'name.required'=>'please enter your name',
            'name.min'=>'bhai kam se kam 3 character toh daal',
            'name.max'=>'bhai zyada se zyada 10 character toh daal',
            'email.email'=>'bhidu email sahi nhi h tera',
        ]);
        
        return $req;
    }

    function setUser(Request $req){
        $name = $req->name;
        $email = $req->email;
        $number = $req->number;
        $address = $req->address;
        $gender = $req->gender;
        $course = $req->course;
        $hobby = $req->hobby;

        return view('dispFormData', ['name'=>$name, 'email'=>$email, 'number'=>$number, 'address'=>$address, 'gender'=>$gender, 'course'=>$course, 'hobby'=>$hobby]);
    }
}
