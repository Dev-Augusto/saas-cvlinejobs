<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class verifyLicense
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       /* if($request->user()->status == 0){
            return redirect()->back()->with('error', 'A sua licença de uso está expirada, por favor pague para poder ter acesso ao sistema!');
        }*/
        return $next($request);
    }
}
