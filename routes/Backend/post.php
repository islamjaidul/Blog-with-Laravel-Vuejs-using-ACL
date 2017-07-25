<?php
Route::get('/posts', [
    'as' => 'posts.all',
    'uses' => 'PostController@getIndex'
]);

Route::get('/post/create', [
   'as' => 'post.create',
    'uses' => 'PostController@getCreatePost'
]);

Route::post('/post/create', [
   'as' => 'post_create.post', 
    'uses' => 'PostController@postCreate'
]);

Route::get('/post/edit/{id}', [
   'as' => 'post.edit',
    'uses' => 'PostController@getEdit'
]);

Route::post('/post/update/{id}', [
   'as' => 'post.update',
    'uses' => 'PostController@postEdit'
]);

Route::get('/post/delete/{id}', [
    'as' => 'post.delete',
    'uses' => 'PostController@getDelete'
]);