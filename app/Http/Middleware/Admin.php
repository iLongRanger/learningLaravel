<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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

        if(Auth::check()){ // will check if login


            if(Auth::user()->isAdmin()){ // check if the user is admin
                return $next($request); // will continue the next request
            }
        }

        return redirect('errors/503');



    }
}
