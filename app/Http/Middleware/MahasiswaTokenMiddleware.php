<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MahasiswaTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $requestToken = $request->header('Mahasiswa-Token');
        $validToken = env('MAHASISWA_API_TOKEN');
        if ($requestToken !== $validToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
