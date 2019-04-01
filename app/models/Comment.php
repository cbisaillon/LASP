<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model representing a comment on a post
 * @package App
 * @author Clement Bisaillon
 */
class Comment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the post that this comment is attached to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo the post that this comment is attached to
     */
    public function post(){
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the user that made this comment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo the user that made this comment
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
