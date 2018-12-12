@extends('layouts.default')
@section('content')

    <div class="col-xs col-xs-offset-2">
        <h1>投稿ページ</h1>

        {{--投稿完了時にフラッシュメッセージを表示--}}
        @include('common.error')

        <form action="store" method="post" class="form">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title" class="">タイトル</label>
                 <div class="">
                     <input type="text"  name="title" value="">
                 </div>
            </div>
            <div class="form-group">
                <label for="cat_id" type="text" class="">カテゴリー</label>
                 <div class="">
                     <select name="cat_id" type="text" class="">
                         <option></option>
                         <option value="1" name="1">電化製品</option>
                         <option value="2" name="2">食品</option>
                     </select>
                 </div>
            </div>
            <div class="form-group">
                <label for="content" class="">本文</label>
                <div class="">
                    <textarea name="content"></textarea>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
        </form>
    </div>
@endsection