<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function cats()
    {
        return $this->belongsTo('App\Category');
    }

    public function child()
    {
        return $this->hasMany('App\Childcategory');
    }
}
