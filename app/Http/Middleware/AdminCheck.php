<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if (Auth::user()->user_type == 'admin') {
            return $next($request);
        } else {
            if (!(Auth::user()->user_type == 'admin')) {
                noty("You can't access this pages,'success");
            }
            DB::table('users')->where('id', Auth::user()->id)->update(['remember_token' => null]);
            DB::table('sessions')->where('user_id', Auth::user()->id)->delete();
            return redirect()->to('/login');
        }
    }
}