<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,Comment::$rules);
//      インスタンスの生成
        $comment = new Comment;


    }
}