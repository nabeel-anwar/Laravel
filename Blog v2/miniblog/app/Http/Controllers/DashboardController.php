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

        $posts = Post::where('user_id', $userid)->orderBy('id', 'DESC')->paginate();
        return view('dashboard', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            "postTitle" => "required",
            "postBody" => "required"
        ]);

        $user = $request->user();
        
        $post = $user->posts()->updateOrCreate(
            ['id' => $request->input('postId')],
            [
                'title' => $request->input('postTitle'),
                'body' => $request->input('postBody')
            ]
        );

        if($post) {
            return response()->json(['post' => $post], 200);
        } else {
            return response()->json(['error' => 'Server is unable to store post data, please try later.'], 422);
        }

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
        
        return response()->json([], 200);
    }

    public function showTable (Request $request) {
        $userid = $request->user()->id;

        $posts = Post::where('user_id', $userid)->orderBy('id', 'DESC')->paginate();

        return response()->json(['post' => $posts], 200);
    }
}
