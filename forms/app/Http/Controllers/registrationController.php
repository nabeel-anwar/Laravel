<?php

namespace App\Http\Controllers;

use FontLib\Table\Type\name;
use Illuminate\Http\Request;

class registrationController extends Controller
{
    function showForm(){
        return view("registration");
    }

    function signUp(Request $request){
        // if($request->hasAny(['name', 'email'])){
        //     print_r($request->input('name'));
        // }

        $validate = $request->validate([
            "name" => "required",
            "email" => "required"
        ]);
        print_r("validated");
        $request->flash();
        
            // return redirect("olddata")->withInput(
            //     $request->except('password')
            // );
            // print_r($request->old('name'));
            // print_r($request->old('email'));
            // print_r($request->old('passord'));
        return view("registration");
    }
}
