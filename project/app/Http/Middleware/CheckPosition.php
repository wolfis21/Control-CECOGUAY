<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPosition
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
/*         if ((!$request->user() && !$request->user()->position != 'administrador')
                 || (!$request->user() && !$request->user()->position != 'usuario')) {
            abort(403, 'Acceso no autorizado.');
        } */

        if (!$request->user()) {
            return redirect('/login'); // Redirigir al usuario a la página de inicio de sesión si no está autenticado
        }
    
        if (!in_array($request->user()->position, ['administrador', 'usuario'])) {
            abort(403, 'Acceso no autorizado.');
        }
   
        return $next($request);
    }
}
