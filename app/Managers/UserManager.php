<?php

namespace App\Managers;


use App\Classes\BaseUser;
use App\MemberDetails;
use App\User;

class UserManager extends BaseUser{
    public function __construct(User $user, MemberDetails $memberDetails){
        parent::__construct($memberDetails);
        $this->user = $user;
    }
}