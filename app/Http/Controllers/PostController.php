<?php

namespace App\Http\Controllers;

//参照するモデルを追加する
use App\Post;
use App\Category;
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
        // クライアントインスタンスを作成
        $client = new \GuzzleHttp\Client();
        
        // GET通信するURL
        $url = 'https://teratail.com/api/v1/questions';
        
        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        return view('posts/index')->with([
            'posts' => $post->getpaginateByLimit(),
            'questions' => $questions['questions'],
            ]);
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function store(PostRequest $request, Post $post)
    {
        // create.blade.phpでnameに定義されているpostを参照している
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        // fillした後にsaveでSQLのinsertと同じクエリになる
        $post->fill($input)->save();
        // .は文字列をつなげる（/posts/{id} という構造になっている)
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post, Category $category)
    {
        return view('posts/edit')->with([
            'post' => $post,
            'categories' => $category->get(),
            ]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        // create.blade.phpでnameに定義されているpostを参照している
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }
}
