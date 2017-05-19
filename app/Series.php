<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
