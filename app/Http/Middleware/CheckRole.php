<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
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
        foreach (auth::guard()->user()->role as $role){
            if (($role->name != 'Administrator') && ($role->name != 'Moderator')){
                return redirect('/home');
            }
        }
        return $next($request);
    }
}
