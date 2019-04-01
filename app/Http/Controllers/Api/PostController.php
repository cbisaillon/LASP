<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 2019-04-01
 * Time: 8:24 AM
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Retrieve the list of posts
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllPosts(Request $request){
        $posts = Post::with('user')->paginate(10)->sortByDesc('created_at')->values();

        return $posts->map(function($post){
            return $post->only(['id', 'title', 'description', 'user', 'created_at']);
        });
    }
}