<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $header = $request->header('Authorization');
        $expectedToken = env('API_TOKEN', 'vg@123');
        $token = null;

        // Support standard Bearer token format
        if ($header && str_starts_with($header, 'Bearer ')) {
            $token = substr($header, 7);
        } else {
            $token = $header;
        }

        if (!$token || $token !== $expectedToken) {
            return response()->json([
                'message' => 'Unauthorized.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
