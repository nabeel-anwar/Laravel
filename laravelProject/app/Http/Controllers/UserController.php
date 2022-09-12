<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function show($name){
        dd(__("pagination.previous"));
        return view("myViews", ['var'=>$name]);
    }
}
