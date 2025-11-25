<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthKeyCheckerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $expectedKey = config('services.api.key');

        $providedKey = $request->header('X-API-KEY')
            ?? $request->input('auth_key');

        if (!$providedKey || $providedKey !== $expectedKey) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid API key.'
            ], 401);
        }

        return $next($request);
    }
}
