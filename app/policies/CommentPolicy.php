<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 2019-04-04
 * Time: 11:54 AM
 */

namespace App\policies;


use App\models\Comment;
use App\models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Check if the logged in user can alter a comment
 * Class CommentPolicy
 * @package App\policies
 */
class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Check if the user can delete a comment
     * @param User $user
     * @param Comment $comment
     * @return bool
     */
    public function delete(User $user, Comment $comment){
        return $user->id == $comment->user_id;
    }
}