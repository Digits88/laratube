<?php

namespace App\Http\Controllers;

use App\Managers\AdminManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $auth;
    private $admin;

    public function __construct(Auth $auth , AdminManager $admin){
        $this->auth = $auth;
        $this->admin = $admin;
//        $this->middleware('auth:admin', ['except' => ['create']]);
        $this->middleware('guest:admin');
    }

    public function index()
    {
        return view('admins.dashboard.index');
    }

    public function create()
    {
        return view('admins.register');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        if($this->admin->login($request->all()))
        {
            return redirect()->route('admin.index');
        }
        else
        {
            return redirect()->route('admin.create');
        }
    }
}
