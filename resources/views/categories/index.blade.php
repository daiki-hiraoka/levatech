@extends('layouts.app')

@section('content')
    <h1>Blog Name</h1>
    
    [<a href='/posts/create'>create</a>]
    [<a href='/'>top</a>]
    
    {{--記事一覧のクラスを作成--}}
    <div class = 'posts'>
        @foreach ($posts as $post)
            {{--記事一つ一つのクラスを作成--}}
            <div class = 'post'>
                <h2 class = 'title'>
                    <a href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                </h2>
                <a href="">{{ $post->category->name }}</a>
                <p class = 'body'>{{ $post->body }}</p>
            </div>
        @endforeach
    </div>
    
    <div class = 'paginate'>
        {{ $posts->links() }}
    </div>
@endsection