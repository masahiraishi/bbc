<?php

namespace App\Http\Controllers;

use Validator;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
//    validationの設定
    public function store(Request $request)
    {

//        validationは、modelにて
        $this->validate($request,Comment::$rules);
//        $validator = Validator::make($request,Comment::$rules,Comment::$messages);
//      インスタンスの生成
        $comment = new Comment;
        $comment->commenter = $request->commenter;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();

//コメント回数
//        $post = new Post;
        $post = Post::find($request->post_id);
        $post->comment_count = $post->comment_count + 1;
        $post->save();

//        $post ->comment_count =

//        $form = $request->all();
//        unset($form['_token']);
//        $comment->fill($form)->save();
//        return redirect('/bbc/single')->with('message','投稿が完了しました');
        return back()
//            ->withErrors($validator)
            ->with('message','投稿が完了しました')
            ->withInput();
    }
}
