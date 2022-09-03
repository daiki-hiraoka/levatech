@extends('layouts.app')

@section('content')
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
        <a href=""><small class='user'> {{ $post->user->name }} <br></small></a>
        <p class = 'body'>{{ $post->body }}</p>
        <p class ='updated_at'>{{ $post->created_at }}</p>
    </div>
    
    <a href="/category/{{ $post->category->id }}">{{ $post->category->name }}</a>
    
    {{-- 記事一覧に戻るリンク --}}
    <!--<p id='txt'></p>-->
    <div class = 'back'>[<a href='/'>back</a>]</div>
    
    {{-- <script src="{{ asset('/js/delete.js') }}"></script> --}}
    
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
@endsection