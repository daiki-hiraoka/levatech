@extends('layouts.app')

@section('content')
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
                <a href='/user'><small class='user'> {{ $post->user->name }} <br></small></a>
                <a href="/category/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <p class = 'body'>{{ $post->body }}</p>
            </div>
        @endforeach
    </div>
    
    
    
    <div class = 'paginate'>
        {{ $posts->links() }}
    </div>
    
    <div class='questions'>
        @foreach ($questions as $question)
            <div>
                <a href="https://teratail.com/questions/{{ $question['id']}}">
                {{ $question['title'] }}
                </a>
            </div>
        @endforeach
    </div>
@endsection
