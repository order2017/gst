<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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

        if ($request->session()->has('admin_user')) {

            if ($request->session()->get('admin_user')){

                return $next($request);

            }

            goto end;

        }else{

            end:
            return redirect('/admin/login')->with('message','2');

        }

    }
}
