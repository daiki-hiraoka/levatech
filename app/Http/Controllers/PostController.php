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
        return view('posts/index')->with(['posts' => $post->getpaginateByLimit(2)]);
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
        $input = $request['post'];
        // fillした後にsaveでSQLのinsertと同じクエリになる
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
