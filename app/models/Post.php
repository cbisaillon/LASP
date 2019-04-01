<?php

namespace App\models;


use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model representing a single post from a user
 * @package App
 * @author Clement Bisaillon
 */
class Post extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
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
        return $this->belongsTo(User::class);
    }
}
