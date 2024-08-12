<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if(!auth()->user()->is_admin){ //user() is the table name, is_admin is a column in user table
                return redirect()->route('getLogin')->with('error','Must be admin to logged in to access this page');
            }
        }
        else{
            return redirect()->route('getLogin')->with('error','Must be logged in to access this page');
        }
        return $next($request);
    }
}
