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
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" id='btn'>delete</button>
        </form>
        <p id='txt'></p>
    
        {{-- 記事一覧に戻るリンク --}}
        <div class = 'edit'>[<a href='/posts/{{ $post->id }}/edit'>edit</a>]</div>
        <div class = 'back'>[<a href='/'>back</a>]</div>
        <script>
            'use strict';
            const post = @json($post);
            const btn = document.getElementById('btn');
            const form = document.getElementById(post.id);
            const txt = document.getElementById('txt');
            txt.textContent = 'id = ' + post.id;
            btn.addEventListener('click', function() {
                const choice = window.confirm('削除すると復元することが出来ません。\n本当に削除しますか？');
                if(choice) {
                    form.submit();
                }
            });
        </script>
    </body>
</html>
