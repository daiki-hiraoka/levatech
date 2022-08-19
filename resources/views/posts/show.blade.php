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
        {{--記事一つ一つのクラスを作成--}}
        <div class = 'post'>
            <h2 class = 'title'>{{ $post->title }}</h2>
            <p class = 'body'>{{ $post->body }}</p>
            <p class ='updated_at'>{{ $post->created_at }}</p>
        </div>
        {{-- 記事一覧に戻るリンク --}}
        <div class = 'back'>[<a href='/'>back</a>]</div>
    </body>
</html>
