<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response;
//use \Response;
use \Exception;

class MemberMiddleware
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
        if( (!Auth::check()) ){
            //return redirect()->back();
            return redirect()->route('login.showLogin');
        }
        
        return $next($request);
    }
}
