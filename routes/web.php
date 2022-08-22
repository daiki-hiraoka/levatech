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

// 最初にコントローラーを参照するように変更する
Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
// LaravelのDI機能を使うために{post}としている
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/edit', 'PostController@edit');

// ブログ投稿作成画面で保存ボタンを押されたときのルーティングの定義
Route::post('/posts', 'PostController@store');

Route::put('/posts/{post}', 'PostController@update');