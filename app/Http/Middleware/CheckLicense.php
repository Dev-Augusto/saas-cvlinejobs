<?php

namespace App\Http\Middleware;

use App\Helpers\Helper;
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
         // Deixa o request seguir primeiro
        $response = $next($request);

        // Depois da requisição processada, verifica a licença
        $user = Auth::user();
        if ($user && Helper::redirectExpirated($user)) {
            return redirect()->route('admin.home')->with('error', 'Licença expirada!');
        }

        return $response;
    }
}
