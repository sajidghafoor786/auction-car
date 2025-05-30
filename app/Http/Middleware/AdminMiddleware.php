<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        if (Auth::check()) {

            if (Auth::user() &&  Auth::user()->usertype == '1') {
                return $next($request);
            }
            else {
                Session::flash('status', 'error');
                Session::flash('message', 'You have not access of admin panel ');
                return redirect()->back();// Redirect for non-admin users
            }
        } 
        else {
            Session::flash('status', 'error');
            Session::flash('message', 'Please login first view your Dashboard');
            return redirect()->route('login');
        }
    }
}
