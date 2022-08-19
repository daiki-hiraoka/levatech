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
        {{--記事一覧のクラスを作成--}}
        <div class = 'posts'>
            @foreach ($posts as $post)
                {{--記事一つ一つのクラスを作成--}}
                <div class = 'post'>
                    <h2 class = 'title'>
                        <a href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                    </h2>
                    <p class = 'body'>{{ $post->body }}</p>
                    <p class ='body'>この文章は{{ $post->created_at }}に作成された。</p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
