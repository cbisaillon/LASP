<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 2019-04-04
 * Time: 9:54 AM
 */

namespace App\models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    public function user(){
        return $this->belongsTo('users');
    }

    public function post(){
        return $this->belongsTo('posts');
    }
}