<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('posts.index');
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
