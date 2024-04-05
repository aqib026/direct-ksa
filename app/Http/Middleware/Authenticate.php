<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        if (isset($guards[0]) && $guards[0] == 'sanctum') {
            config(['auth.defaults.guard' => 'api']);
            if (!Auth::check()) {
                return response()->json(["success"=>false,'error' => 'Authentication Failed.'], 401);
            }
        }
        $this->authenticate($request, $guards);
        return $next($request);
    }
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
