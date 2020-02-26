<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];

    protected $uploads = 'images/';

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
}
