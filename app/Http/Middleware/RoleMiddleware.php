<?php
//yahahaha
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->user() || $request->user()->role !== $role) {
            // Jika user tidak memiliki role yang sesuai, tampilkan pesan error
            return response('Unauthorized', 403);
        }

        return $next($request);
    }
}
