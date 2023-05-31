<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if(Auth()->user()->usertype=='admin')
        {
        return $next($request);
        }
        echo "<h3>YOU ARE NOT ALLOW IN THIS PAGE</h3>";
        abort(401);

    }
}
