<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User|null $user */
        $user = Auth::user();

        // ara l'editor sap que $user es un objecte de la clase App\Models\User
        if (!$user || !$user->isAdmin()) {
            abort(403, 'No tens permis per accedir');
        }

        return $next($request);
    }
}
