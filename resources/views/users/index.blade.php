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
        
        [<a href='/posts/create'>create</a>]
        [<a href='/'>top</a>]
        
        {{--記事一覧のクラスを作成--}}
        <div class = 'own_posts'>
            @foreach ($own_posts as $post)
                {{--記事一つ一つのクラスを作成--}}
                <div class = 'post'>
                    <h4 class = 'title'>
                        <a href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                    </h4>
                    <small class='user'> {{ $post->user->name }} <br></small>
                    <p class = 'body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        
        <div class = 'paginate'>
            {{ $own_posts->links() }}
        </div>
    </body>
</html>
@endsection
