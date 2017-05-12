<?php

namespace App\Classes;

use App\MemberDetails;
use Illuminate\Support\Facades\Auth;

class BaseUser{

    public $memberDetails;
    protected $id;
    protected $user;

    public function __construct(MemberDetails $memberDetails){
        $this->memberDetails = $memberDetails;
    }

    public function register($data){
        $this->id = uniqid();
        $this->user->id = $this->id;
        $this->user->email = $data['email'];
        $this->user->password = bcrypt(trim($data['password']));
        $this->user->hash = md5($this->id);
        $this->user->isActive = 0;
        $this->user->isBlock = 0;

        $this->user->save();
        $this->createUserDetails($data);
    }

    public function createUserDetails($data){
        $this->memberDetails->name = $data['name'];
        $this->memberDetails->coverImage = $this->id . '.jpg';
        $this->memberDetails->profileImage = $this->id . '.jpg';
        $this->user->memberDetails()->save($this->memberDetails);
    }

    public function login($credentials){
        return Auth::attempt(["email" => $credentials['login_email'],"password" => $credentials['login_password']]);
    }

    public function logout($route){
        Auth::logout();
        return redirect()->route($route);
    }

}