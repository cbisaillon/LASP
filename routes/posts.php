<?php
Route::get('', 'PostController@index')->name('posts.index');
Route::get('create', 'PostController@create')->middleware('auth')->name('posts.create');
Route::post('store', 'PostController@store')->middleware('auth')->name('posts.store');
Route::get('{post}', 'PostController@show')->name('posts.show');
Route::get('{post}/download', 'PostController@download')->name('posts.download');
Route::get('{post}/edit', 'PostController@edit')->middleware('auth')->name('posts.edit');
Route::post('{post}/edit', 'PostController@update')->middleware('auth')->name('posts.update');
Route::post('{post}/like', 'Api\PostController@likePost')->middleware('auth')->name('posts.like');
Route::post('{post}/comment', 'PostController@addComment')->middleware('auth')->name('posts.comment');