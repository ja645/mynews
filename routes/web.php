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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //ニュース作成
    Route::get('news/create', 'Admin\NewsController@add')->name('scoop');
    Route::post('news/create', 'Admin\NewsController@create');
    
    //マイニュース一覧 これはmypageに統合した
    Route::get('news', 'Admin\ProfileController@mypage')->name('mynews');
    
    
    //ニュース編集
    Route::get('{id}/news/{news_id}/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    
    //ニュース削除
    Route::get('{id}/news/{news_id}/delete', 'Admin\NewsController@delete');
    
    //マイプロフィール
    Route::get('{id}/profile', 'Admin\ProfileController@mypage')->name('mypage');
    
    //プロフィール作成
    Route::get('profile/create', 'Admin\ProfileController@add')->name('profile.create');
    Route::post('profile/create', 'Admin\ProfileController@create');
    
    //プロフィル編集
    Route::get('{id}/profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');