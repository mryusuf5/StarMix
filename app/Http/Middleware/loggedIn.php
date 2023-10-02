<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class loggedIn
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session::get("user"))
            return redirect()->route("loginView")->with("error", "You need to be logged in.");

        return $next($request);
    }
}
