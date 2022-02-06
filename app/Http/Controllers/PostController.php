<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    //
    public function index()
    {
        $Posts = Post::latest()->with(['user', 'likes'])->paginate(20);


        return view('posts.index', [
            'Posts' => $Posts
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
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
    public function destroy(Post $post)
    {
        // if (!$post->ownedBy(auth()->user())) {
        // }
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
