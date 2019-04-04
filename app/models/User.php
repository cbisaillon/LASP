<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the posts that this user made
     * @return \Illuminate\Database\Eloquent\Relations\HasMany the posts that this user made
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }

    /**
     * Get the comments that this user made
     * @return \Illuminate\Database\Eloquent\Relations\HasMany the comments that this user made
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    /**
     * The likes associated with this user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes(){
        return $this->hasMany(Like::class);
    }

    /**
     * Like a post
     * @param Post $post the post to like
     * @return boolean true if successful, false otherwise
     */
    public function like(Post $post){
        //Like the post
        if(!$this->liked($post)){
            $like = new Like();
            $like->user_id = $this->id;
            $like->post_id = $post->id;
            $like->save();

            return true;
        }
        return false;
    }

    /**
     * Check if the user has liked a post
     * @param Post $post
     * @return bool true if the user liked the post, false otherwise
     */
    public function liked(Post $post){
        $alreadyLiked = $this->whereHas('likes', function($query) use($post){
            return $query->where('post_id', $post->id);
        })->count();

        return $alreadyLiked > 0;
    }
}
