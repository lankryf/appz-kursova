<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ForAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $user = $request->user();
        $role = $user->getRole();
        if ($role->isNull() || $role->getId() !== Role::ADMIN_ROLE_ID) {
            return response()->json(['message' => 'Permission denied'], 403);
        }
        return $next($request);
    }
}
