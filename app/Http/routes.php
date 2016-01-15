<?php

/*前台页面*/

Route::get('/', 'HomeController@index');
Route::get('/article/{id}','HomeController@show');
Route::get('/category/{id}','HomeController@category');
Route::get('/tag/{id}','HomeController@tag');
Route::get('/about',function(){
    return '<h1>Click the Link : <a href="https://ciyuanai.net/about.html">About.html</a><h1></h1>';
});

/*登陆注册*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*后台管理*/

Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => 'auth'],function()
{
    Route::post('/uploadImage','UploadController@uploadImage');

    Route::get('/','AdminController@index');

    Route::get('article/recycle', 'ArticleController@recycle');
    Route::get('article/destroy/{id}/','ArticleController@destroy');
    Route::get('article/restore/{id}', 'ArticleController@restore');
    Route::get('article/delete/{id}', 'ArticleController@delete');
    Route::resource('article','ArticleController');

    Route::get('category/destroy/{id}/','CategoryController@destroy');
    Route::resource('category','CategoryController');

    Route::get('tags/destroy/{id}/','TagController@destroy');
    Route::resource('tags','TagController');
});