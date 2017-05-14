<?php

namespace App\Managers;


use App\Classes\BaseUser;
use App\MemberDetails;
use App\User;
use Illuminate\Mail\Mailer;

class UserManager extends BaseUser{

    public function __construct(User $user, MemberDetails $memberDetails,Mailer $mail){
        parent::__construct($memberDetails,$mail);
        $this->user = $user;
    }
    
}