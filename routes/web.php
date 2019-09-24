<?php

use Illuminate\Support\Facades\Input;



Route::get('/', function () {
    return view('pages.index');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'PagesController@about')->name('home');

Route::resource('posts', 'PostsController');

Route::post('posts/comment/{id}', 'CommentController@comment');



Auth::routes();
