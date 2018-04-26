<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        $roles = explode("-", $rol);
        //dd($roles);
        if(Auth::check())
        {
            if($roles[0]=="any")
                return $next($request);
            //dd($rol);

            if(!in_array(Auth::user()->id_rol, $roles))
                abort(403, 'Unauthorized action.');
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
        
    }
}
