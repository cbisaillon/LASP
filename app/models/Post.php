<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Model representing a single post from a user
 * @package App
 * @author Clement Bisaillon
 */
class Post extends Model
{
    use SoftDeletes;

    protected $appends = [
        'liked',
        'nb_likes',
        'nb_comments',
    ];

    /**
     * The comments associated with this post
     * @return HasMany the comments associated with this post
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    /**
     * The user that made this post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo the user that made this post
     */
    public function user(){
        return $this->belongsTo(User::class)->select(array('id', 'name'));
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    /**
     * Check if the logged in user liked the post
     * @return mixed
     */
    public function getLikedAttribute(){
        $user = Auth::guard('web')->user();

        if($user && $user->liked($this)){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Get the number of likes this post has
     * @return int the number of likes
     */
    public function getNbLikesAttribute(){
        return $this->likes()->count();
    }

    /**
     * Get the number of comments this post has
     * @return int the number of comments
     */
    public function getNbCommentsAttribute(){
        return $this->comments()->count();
    }
}
