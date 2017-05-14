<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->isActive){
                return $next($request);
            }
            return redirect()->route('user.create')->with('loginError','Please Confirm Your Email');
        }
        return redirect()->route('user.create')->with('loginError','Please Login First');
    }
}
