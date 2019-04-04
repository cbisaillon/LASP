<?php

namespace App\Http\Controllers;

use App\models\Comment;
use App\models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Controls the posts models
 * Class PostController
 * @package App\Http\Controllers
 * @author Clement Bisaillon
 */
class PostController extends Controller
{
    /**
     * Show all the posts
     * @return string
     */
    public function index(Request $request){
        return view('posts/index', [
            'post_endpoint' => route('api.posts.index'),
            'show_endpoint' => route('posts.show', ['post' => ':post_id'])
        ]);
    }

    public function show(Request $request, Post $post){
        $liked = Auth::user()->liked($post);

        return view('posts/show', compact('post', 'liked'));
    }


    public function create(Request $request){
        return view('posts/create');
    }

    public function edit(Request $request, Post $post){
        return view('posts/edit', compact('post'));
    }

    /**
     * Store a newly created post
     * @param Request $request
     */
    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:256',
            'description' => 'required|max:516',
            'jar_file' => 'file'
        ]);

        //Save the jar file
        $file = $request->file('jar_file');
        $path = $file->store('public/posts');
        //end save file

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->jar_file_location = $path;
        $post->user_id = $request->user()->id;
        $post->save();

        return redirect(route('posts.show', $post));
    }

    /**
     * Download the specified algorithm file
     * @param Request $request
     * @param Post $post
     */
    public function download(Request $request, Post $post){
        return Storage::download($post->jar_file_location, $post->title . ".jar");
    }

    public function update(Request $request, Post $post){
        return redirect(route('posts.show', $post));
    }

    /**
     * Add a comment to the post
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addComment(Request $request, Post $post){
        $request->validate([
            'text' => 'required'
        ]);
        $user = $request->user();

        //Create the comment
        $comment = new Comment();
        $comment->text = $request->input('text');
        $comment->user_id = $user->id;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect(route('posts.show', $post));
    }
}
