<?php
/*
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Make sure to import the Auth facade
use Symfony\Component\HttpFoundation\Response; // Import the correct Response namespace

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
    
    
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request); // Continue to the next middleware/request
        } else {
            return redirect('/'); // If not admin, redirect to homepage
        }
    }
}
*/