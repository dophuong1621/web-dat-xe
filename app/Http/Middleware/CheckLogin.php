<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CheckLogin
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
        // Nếu tồn tại session
        if ($request->session()->exists('id')) {
            // có -> đi tiếp
            return $next($request);
        } else {
            // không có -> về trang login
            return Redirect::route("login")
                // ->with('error', [
                //     "message" => 'Chưa đăng nhập',
                // ]
                // )
            ;
        }
    }
}
