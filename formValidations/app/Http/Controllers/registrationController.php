<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validateRequest;

class registrationController extends Controller
{
    function showForm(){
        return view("registration");
    }

    function signUp(validateRequest $request){
        // $validate = $request->validate([
        //     "name" => "required",
        //     "email" => "required",
        //     "password" => "required"
        // ]);
        // $inputes = $request->except("_token");
        // return view("registration", ["data" => $inputes]);

        $request->validate();

        return view("registration");

    }
}
