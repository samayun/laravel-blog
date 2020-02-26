<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id' , 'author' , 'email' , 'is_active','body'];

   public function replies()
   {
       return $this->hasMany('App\Model\CommentReply');
   }

   public function post()
   {
       return $this->belongsTo('App\Model\Post');
   }

   public function user()
   {
       return $this->belongsTo('App\User');
   }
}
