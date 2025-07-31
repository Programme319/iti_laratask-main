<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckApiToken
{
    public function handle(Request $request, Closure $next): Response
    {
        // Example: Check if the token is valid
        $token = $request->header('API-TOKEN');
        
        if ($token !== 'your-secret-token') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
