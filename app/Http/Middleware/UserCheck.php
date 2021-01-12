<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserCheck
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
        if(!Auth::check()){
            if($request->path() == 'user/register_user' || $request->path() == 'user/login_user'){
                return $next($request);
            }
            return response()->json([
                'msg'=> "You are not allowed to access this route......"
            ], 403);
        }

        return $next($request);
    }
}
