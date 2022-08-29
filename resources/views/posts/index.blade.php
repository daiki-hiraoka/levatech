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
        {{ Auth::user()->name }}
        <h1>Blog Name</h1>
        
        [<a href='/posts/create'>create</a>]
        
        {{--記事一覧のクラスを作成--}}
        <div class = 'posts'>
            @foreach ($posts as $post)
                {{--記事一つ一つのクラスを作成--}}
                <div class = 'post'>
                    <h2 class = 'title'>
                        <a href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                    </h2>
                    <a href="/category/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class = 'body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        
        <div class = 'paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection
