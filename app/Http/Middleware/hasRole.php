<?php

namespace App\Http\Middleware;

use Closure;

class hasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if($request->user()->hasRole($role)==null)
        {
            return redirect('/login');
        }elseif(! $request->user()->hasRole($role)) {
                return redirect('/home');
            }

        return $next($request);
    }
}
