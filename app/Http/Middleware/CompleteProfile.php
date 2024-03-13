<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompleteProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si tous les champs nécessaires sont remplis dans la base de données
        $user = $request->user();

        if ($user && !$user->VerifierSiProfileEstComplet()) {
            // Si tous les champs, à l'exception de "bio", ne sont pas remplis
            // Affichez la notification et redirigez l'utilisateur vers une page pour compléter son profil
            notyf()->ripple(true)->addError('Veuillez terminer votre profile avant d\'accéder à cette page.');
            return redirect()->route('myProfile');
        }
        return $next($request);
    }
}