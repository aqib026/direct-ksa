<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
            // if(Auth()->user()->usertype=='customer')
            // {
            return $next($request);
            // }
            // echo "<h3>You Have to make account in User side</h3>";
            // abort(401);
    
        
    }
}
