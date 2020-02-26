<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['comment_id' , 'author' , 'email' , 'is_active','body'];

    public function comment()
    {
        return $this->belongsTo('App\Model\Comment');
    }
}
