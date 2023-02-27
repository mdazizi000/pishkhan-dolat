<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class authOffice
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
        $user = auth()->guard('office')->user() ? auth()->guard('office')->user() :auth()->guard('officeUser')->user();
        if(empty($user)){
            return redirect()->route('/');
        }
        return $next($request);
    }
}
