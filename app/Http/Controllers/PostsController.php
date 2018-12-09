<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('bbc.index')->with('posts',$posts);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('bbc.single')->with('post',$post);
    }
}
