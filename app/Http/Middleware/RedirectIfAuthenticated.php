<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if(Auth::check()){
            if(auth()->user()->username == "" || auth()->user()->fname == "" || auth()->user()->lname == "" || auth()->user()->gender == "" || auth()->user()->	birthday == ""){
                return redirect()->route('page.information');
            }
            return redirect()->route('page.home');
        }

        return $next($request);
    }
}
