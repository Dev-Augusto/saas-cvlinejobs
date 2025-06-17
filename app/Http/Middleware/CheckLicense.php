<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLicense
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        \App\Helpers\Helper::licenseExpirated($user);

        if (\App\Helpers\Helper::redirectExpirated($user)) {
            return redirect()->route('admin.home')->with('error', 'A sua licença de uso está expirada, por favor pague para poder ter acesso ao sistema de currículos!');
        }

        return $next($request);
    }
}
