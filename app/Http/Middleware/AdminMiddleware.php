<?php

namespace App\Http\Middleware;

use Closure;

use Sentinel;

class AdminMiddleware
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
        if(Sentinel::check()){
            if(Sentinel::getUser()->roles()->first()->slug == "manager"){
                return $next($request);
            }else {
                return redirect('my-account/');
            }

        }else {
            return redirect('adminpanel/login');
        }

    }
}
