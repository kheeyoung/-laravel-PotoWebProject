<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle (Request $request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->back()->withErrors(['msg' => '로그인을 해주세요!']);;
        }
    
        return $next($request);
    }
}
