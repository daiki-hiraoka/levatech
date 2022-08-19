<?php

namespace App\Http\Controllers;

//参照するモデルを追加する
use App\Post;
use Illuminate\Http\Request;

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
}
