<?php
/**
 * Created by PhpStorm.
 * User: Rumi
 * Date: 5/16/2017
 * Time: 4:50 PM
 */

namespace App\Classes;

use Illuminate\Support\Facades\Auth;

class BaseAdmin
{
    protected $admin;

    public function login($credentials){
        if(Auth::guard('admin')->attempt(["email" => $credentials['email'],"password" => $credentials['password']])){
            return true;
        }
        return false;
    }

    public function logout($route){
        Auth::logout();
        return redirect()->route($route);
    }
}