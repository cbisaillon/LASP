<?php

namespace App\Http\Controllers;

use App\models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function destroy(Request $request, Comment $comment){
        $this->authorize('delete', $comment);
        $redirectPost = $comment->post;
        $comment->delete();

        return redirect(route('posts.show', $redirectPost));
    }
}
