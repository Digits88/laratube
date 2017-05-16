<?php

namespace App\Classes;

use App\Mail\ConfirmAccountEmail;
use App\MemberDetails;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;

class BaseUser{

    public $memberDetails;
    protected $id;
    protected $user;
    protected $confirmURL;

    public function __construct(MemberDetails $memberDetails, Mailer $mail){
        $this->memberDetails = $memberDetails;
        $this->mail = $mail;
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
        
        $this->sendConfirmEmail($data['name']);
        
    }

    public function createUserDetails($data){
        $this->memberDetails->name = $data['name'];
        $this->memberDetails->coverImage = $this->id . '.jpg';
        $this->memberDetails->profileImage = $this->id . '.jpg';
        $this->user->memberDetails()->save($this->memberDetails);
    }

    public function login($credentials){
        if(Auth::attempt(["email" => $credentials['login_email'],"password" => $credentials['login_password']])){
            return true;
        }
        return false;
    }

    public function logout($route){
        Auth::logout();
        return redirect()->route($route);
    }


    public function sendConfirmEmail($name){
        $this->confirmURL = route('user.confirm',['id' => $this->user->id, 'hash' => $this->user->hash]);
        $this->mail->to($this->user->email)->later(10,new ConfirmAccountEmail($name, $this->confirmURL));
    }

    public function confirmEmail($id,$hash){
        $this->user = $this->user->find($id);
        if($this->user->hash == $hash){
            $this->user->isActive = 1;
            $this->user->update();
            return true;
        }
        return false;
    }
}