<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static $rules = [
        'commenter' =>'required',
        'comment' => 'required',
    ];

    public static $messages = [
        'commenter.required' => 'タイトルを正しく入力してください。',
        'comment.required' => '本文を正しく入力してください。',
    ];

}
