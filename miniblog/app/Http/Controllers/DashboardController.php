<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userid = $request->user()->id;

        $posts = Post::where('user_id', $userid)->paginate(5);
        return view('dashboard', ['posts' => $posts]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //load current data to update view blade
    public function show($id)
    {
        $updatePost = Post::find($id);
        return view('updatepost', ['updatePost' => $updatePost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatePost = Post::find($id);
        $updatePost->title = $request->postTitle;
        $updatePost->body = $request->postBody;
        $updatePost->save();

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('dashboard'));
    }
}
