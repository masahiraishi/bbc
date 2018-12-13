<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static $rules = [
        'title' =>'required',
        'content' =>'required',
        'cat_id' =>'required',
    ];
    public static $messages = [
            'title.required'=>'タイトルを正しく入力してください',
            'content.required'=>'本文を正しく入力してください',
            'cat_id.required'=>'カテゴリーを選択してください',
    ];


    public function comments()
    {
//        投稿は複数のコメントをもつ
        return $this ->hasMany('App\Comment','post_id');
    }

    public function category()
    {
//        投稿は一つのカテゴリーに属する
        return $this->belongsTo('App\Category','cat_id');

    }


}
