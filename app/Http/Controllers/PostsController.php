<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('bbc.index',['posts'=>$posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
//        $post_paginate = $post->comments->simplePaginate(5);
        return view('bbc.single',['post'=>$post,]);
    }
    public function create()
    {
        return view('bbc.create');
    }

    public function storeBlog(Request $request)
    {
//        $validator = Validator::make($request,Comment::$rules,Comment::$messages);
        $this->validate($request, Post::$rules);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->contents;
        $post->cat_id = $request->cat_id;
        $post->comment_count = 0;
        $post->save();

        return back()->with('message', '投稿が完了しました。');
    }

    public function showCategory( $id)
    {
//カテゴリ名の取得
        $category_title = Category::find($id);
        $category_posts = Post::where('cat_id', $id)->get();
//    var_dump($category_title);
        return view('bbc.category',['category_posts'=>$category_posts,
            'category_title'=>$category_title]);
    }
}































