<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class VerificarFinalizado

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $usuario = Auth::user();
        
        if ($usuario->finalizado == 1) {
            alert()
            ->warning('ATENCIÓN',  'Ya has finalizado tu solicitud')
            ->showConfirmButton('Aceptar', '#ab0033');
            return Redirect::route('form0');
        }
        return $next($request);
    }
}
