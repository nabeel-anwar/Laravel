<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facuse Illuminate\Http\Request;ades\DB;

class sqlController extends Controller
{
    public function show () {

        // Insertion
        // DB::insert("insert into students (name, email, password) values (?,?,?)",
        // ["Ghufran", "ghufran@gmail.com", "ghufranl123"]);

        // Selection
        // $students = DB::select("select * from students");
        $students = DB::table("students")->get();
        dd($students);


        //Update
        // DB::update("update students set name=?, email=? ,password=? where id=?",
        // ["Hamza","hamza@gmail.com","hamza123", 4]);
        
        //Deletion
        // DB::delete("delete from students where id=?", [2]);
        return view("welcome", ["students" => $students]);
    }
}
