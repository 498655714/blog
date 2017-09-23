<?php

namespace App\Http\Middleware;
use Closure;
class Main
{
    public function handle($request,\Closure $next){
        
        return $next($request);
    }
}
