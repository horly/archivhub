<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((Auth::user() && Auth::user()->role->name === 'admin') || Auth::user()->role->name === 'superadmin') {

            return $next($request);
        }

        return redirect()->back()->with('danger', __('dashboard.you_do_not_have_the_necessary_rights_to_access_this_page'));
    }
}
