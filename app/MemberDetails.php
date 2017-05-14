<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberDetails extends Model
{

    public $timestamps= false;

    public function member(){
        return $this->morphTo();
    }
}
