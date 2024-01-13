<?php

namespace App\Http\Middleware;

use Closure;

class AddCustomHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->header('Access-Control-Allow-Origin', 'https://ipims-git-master-gabriel-26s-projects.vercel.app');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
        $response->header('Access-Control-Allow-Credentials', 'true');
        
        return $response;
    }
}