@extends('layouts.default')
@section('content')
    <div class="col-xs-8 col-xs-offset-2">
        <h1>{{$category_title->name}}カテゴリ</h1>
        @foreach($category_posts as $category_post)
            <h2>タイトル：{{$category_post->title}}
                <small>投稿日:{{date("Y年 m月 d日",strtotime($category_post->created_at))}}</small>
            </h2>
            <p>{{$category_post->content}}</p>
            <p><a href="{{url('bbc',$category_post->id)}}" class="btn btn-primary">続きを読む</a></p>
            <p>コメント数：{{$category_post->comment_count}}</p><hr>
        @endforeach
    </div>
@endsection