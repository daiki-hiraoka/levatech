<?php

namespace App\Http\Controllers;

//参照するモデルを追加する
use App\Post;
use App\Http\Requests\PostRequest;

/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
class PostController extends Controller
{
    public function index(Post $post)
    {
        /**
         * データベースから受け取ったデータをviewに渡す
         * postsにはpost1,post2,....のようにデータが渡される
         */
        return view('posts/index')->with(['posts' => $post->getpaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store(PostRequest $request, Post $post)
    {
        // create.blade.phpでnameに定義されているpostを参照している
        $input = $request['post'];
        // fillした後にsaveでSQLのinsertと同じクエリになる
        $post->fill($input)->save();
        // .は文字列をつなげる（/posts/{id} という構造になっている)
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        // create.blade.phpでnameに定義されているpostを参照している
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
        
    }
}
