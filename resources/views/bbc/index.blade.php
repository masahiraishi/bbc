@extends('layouts.default')

@section('content')
    <div class="col-xs-8 col-xs-offset-2">
        <a href="bbc/create" class="btn btn-primary">記事を新しく登録する</a>
        @foreach($posts as $post)

            <h2>タイトル:{{$post->title}}
                <small>投稿日:{{date("Y年 m月 d日",strtotime($post->created_at))}}</small>
            </h2>
{{--            <p>カテゴリー:{{$post->category->name}}</p>--}}
            <p>カテゴリー:<a href="{{url('bbc/category',$post->category->id)}}">{{$post->category->name}}</a></p>
            <p>{{$post->content}}</p>
            <p><a href="{{url('bbc',$post->id)}}" class="btn btn-primary">続きを読む</a></p>
            <p>コメント数:{{$post->comment_count}}</p>

        @endforeach
    </div>
@endsection
