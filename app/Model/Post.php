<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','body' ,'category_id' ,'photo_id','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function photo()
    {
        return $this->belongsTo('App\Model\Photo');
    }
    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Model\Comment');
    }
}
