<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $Posts = Post::paginate(20);


        return view('posts.index', [
            'Posts' => $Posts
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        // auth()->user()->posts()->create();
        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,

        ]);
        return back();
    }
}
