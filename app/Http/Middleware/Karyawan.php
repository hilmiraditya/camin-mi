<?php

namespace App\Http\Middleware;

use Closure;

class Karyawan
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
        if(auth()->user()->isAdmin == 0)
        {
            return $next($request);
            //return 'karyawan goblok';
        }
        return redirect('/');
    }
}
