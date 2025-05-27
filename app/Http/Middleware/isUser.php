<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     *   
     * @param  
     *
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->role !== 'admin' and $request->user()->role !== 'user') {
            return redirect('/')->with('error', 'You do not have admin access.');
        }
        return $next($request);
    }
}