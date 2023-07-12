<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class authCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session()->has('loggedUser') && ($request->path() !='/')){
            return redirect()->route('login')->with('fail', 'please login');
        }

        
        return $next($request)->header('Cache-Control','no-cache , no-store, max-age=0, must-revalidate')
                              ->header('Pragma', 'no-cache');
    }
}
