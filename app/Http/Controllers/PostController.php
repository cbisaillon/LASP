<?php

namespace App\Http\Controllers;

use App\models\Post;
use Illuminate\Http\Request;

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
        $posts = Post::all();

        return view('posts/index', compact('posts'));
    }

    public function show(Request $request, Post $post){
        return view('posts/show', compact('post'));
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

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->jar_file_location = "";
        $post->save();

        return redirect(route('posts.show', $post));
    }

    public function update(Request $request, Post $post){
        return redirect(route('posts.show', $post));
    }
}
