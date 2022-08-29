<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function(){
    // 最初にコントローラーを参照するように変更する
    Route::get('/', 'PostController@index');
    Route::get('/posts/create', 'PostController@create');
    // LaravelのDI機能を使うために{post}としている
    Route::get('/posts/{post}', 'PostController@show');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/category/{category}', 'CategoryController@index');
    Route::get('/user', 'UserController@index');
    
    // ブログ投稿作成画面で保存ボタンを押されたときのルーティングの定義
    Route::post('/posts', 'PostController@store');
    // 編集ボタンを押されたときのルーティングの定義
    Route::put('/posts/{post}', 'PostController@update');
    // ブログ詳細画面で削除ボタンを押されたときのルーティングの定義
    Route::delete('/posts/{post}', 'PostController@delete');
});
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');
