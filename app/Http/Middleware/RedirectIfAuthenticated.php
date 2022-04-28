<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                    Toastr::info('Welcome', 'Info', ["positionClass" => "toast-top-center"]);
                    return ('home');
                    break;
                case 'basic':
                    return redirect('/users-dashboard');
                    break;

                default:
                    return redirect('home');
                    break;
            }
        }
        return $next($request);
    }

    // public function handle(Request $request, Closure $next, ...$guards)
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             return redirect(RouteServiceProvider::HOME);
    //         }
    //     }

    //     return $next($request);
    // }
}
