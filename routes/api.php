<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:web')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('posts')->name('posts.')->group(function(){
    Route::get('', 'Api\PostController@getAllPosts')->name('index');
});
