<?php

namespace App\Http\Controllers;

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
        return $post->get();
    }
}
