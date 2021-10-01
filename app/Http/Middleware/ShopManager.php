<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ShopManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->hasRole(['super_admin', 'admin', 'shop_manager'])) {
            return redirect(URL::previous())
                ->with('message', 'No tiene los permisos suficientes para realizar dicha acción');
        }

        return $next($request);
    }
}
