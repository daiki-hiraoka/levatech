@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        
        <div class = 'edit'>[<a href='/posts/{{ $post->id }}/edit'>edit</a>]</div>
        
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline" onsubmit="return dialogDelete()">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
        
        {{--記事一つ一つのクラスを作成--}}
        <div class = 'post'>
            <h2 class = 'title'>{{ $post->title }}</h2>
            <p class = 'body'>{{ $post->body }}</p>
            <p class ='updated_at'>{{ $post->created_at }}</p>
        </div>
        
        <a href="/category/{{ $post->category->id }}">{{ $post->category->name }}</a>
        
        {{-- 記事一覧に戻るリンク --}}
        <!--<p id='txt'></p>-->
        <div class = 'back'>[<a href='/'>back</a>]</div>
        
        <script>
            function dialogDelete(){
                'use strict';
                const post = @json($post);
                if(window.confirm('削除したら復元出来ません。\n本当に削除しますか？')) {
                    return true;
                } else {
                    alert('キャンセルされました。');
                    return false;
                }
            }
        </script>
    </body>
</html>
@endsection