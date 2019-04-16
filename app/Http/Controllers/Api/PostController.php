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
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Retrieve the list of posts
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllPosts(Request $request){
        $posts = Post::query()->with('user')->paginate(6, ['id', 'jar_file_location', 'title', 'description', 'created_at', 'user_id'])->toJson();

        return $posts;
    }

    /**
     * Like a specific post
     * @param Request $request
     * @param Post $post
     */
    public function likePost(Request $request, Post $post){
            $user = Auth::user();

            if ($user->like($post)) {
                return "Success";
            } else {
                return response('Failure', 405);
            }
    }
}