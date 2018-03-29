<?php

namespace App\Http\Middleware;

use Closure;

class MobileLogin
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
        if ($request->session()->has('mobile_user')) {

            if ($request->session()->get('mobile_user')){

                return $next($request);

            }

            goto end;

        }else{

            end:
            return redirect('/user-login')->with('message','0');

        }
    }
}
