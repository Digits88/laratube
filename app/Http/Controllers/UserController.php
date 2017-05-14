<?php

namespace App\Http\Controllers;

use App\Managers\UserManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $request;
    private $auth;
    private $user;

    public function __construct(Request $request, Auth $auth , UserManager $user){
        $this->request = $request;
        $this->auth = $auth;
        $this->user = $user;
    }

    public function create(){
        return view('pages.register');
    }

    public function store(){

        $this->validate($this->request,[
            "name"  =>  "bail|required|min:5",
            "email" =>  "bail|required|email|unique:users",
            "password"  =>  "bail|required|min:8",
            "confirm-password"  =>  "same:password"
        ],[
            "email.unique"  =>  "This User Already Exists",
            "confirm-password.same"  => "The passwords do not match"
        ]);
        
        $this->user->register($this->request->all());
    }

    public function confirmMail($id,$hash){
        $this->user->confirmEmail($id,$hash);
        if($this->user->confirmEmail($id,$hash)){
            return redirect()->route('user.create');
        }
    }

    public function login(){
        if($this->user->login($this->request->all())){
            return redirect()->route('user.dashboard');
        }
        return redirect()->route('user.create')->with('loginError','Email or Password is wrong.');
    }

    public function logout(){
        return $this->user->logout('user.create');
    }
}