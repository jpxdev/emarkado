<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApprovedStatus
{
    public function handle($request, Closure $next, $guard = null)
    {
        $user = Auth::guard($guard)->user();

        if ($user && $user->status == 'Approved') {
            return $next($request);
        }

        Auth::guard($guard)->logout(); // Log out if user is not approved
        return redirect()->route('getLogin')->with('error','Must be logged in to access this page');
    }
}
