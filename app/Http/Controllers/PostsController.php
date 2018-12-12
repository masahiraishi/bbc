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
        return view('bbc.single',['post'=>$post]);
    }
    public function create()
    {
        return view('bbc.create');
    }

    public function store()
    {
        $rules = [
            'title' =>'required',
            'content' =>'required',
            'cat_id' =>'required',
        ];

        $messages = [
            'title.required'=>'タイトルを正しく入力してください',
            'content.required'=>'本文を正しく入力してください',
            'cat_id.required'=>'カテゴリーを選択してください',
        ];

        $validator = Validator::make(Input::all(),$rules,$messages);

        if($validator->posses()){
            $post = new Post;
            $post->title = Input::get('title');
            $post->content = Input::get('content');
            $post->cat_id =Input::get('cart_id');
//            $request->all();
            $post->save();
            return Redirect::back()
                ->with('message','投稿が完了しました。');
        }else{
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
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































