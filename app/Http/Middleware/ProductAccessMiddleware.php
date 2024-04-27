<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->apiToken();

        if (!$token) {
            return response()->json(["Token is missing" => "Unauthorized"], 401);
        }

        if ($token !== env('API_TOKEN')) {
            return response()->json(['Token is invalid' => 'Unauthorized'], 401);
        }

        return $next($request);
    }

    
}
