<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->is_admin == 1) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Toegang verboden');
    }
}
