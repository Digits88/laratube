<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    
    public $incrementing = false;

    public function memberDetails(){
        return $this->morphOne('App\MemberDetails','member');
    }
}
