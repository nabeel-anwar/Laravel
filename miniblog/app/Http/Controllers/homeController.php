<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class homeController extends Controller
{
    public function show () {
        $posts = Post::paginate(5);
        return view('home', ['posts' => $posts]);
    }
}
