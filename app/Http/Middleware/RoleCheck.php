<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        // $allowedRoles=array_map('intval', $role);
        // if(!in_array(auth()->user()->role_id, $allowedRoles)){
        //     abort(403, 'Unauthorized Access');
        // }
        // return $next($request);

        // if (!auth()->check()) {
        //     abort(403, 'Please login first');
        // }

        // $allowedRoles = array_map('intval', $role);

        // if (!in_array(auth()->user()->role_id, $allowedRoles)) {
        //     abort(403, 'Unauthorized Access');
        // }

            $user = auth()->user();

            if (!$user) {
                abort(403, 'Please login first');
            }

            $allowedRoles = array_map('intval', $role);

            if (!in_array($user->role_id, $allowedRoles)) {
                abort(403, 'Unauthorized Access');
            }

            return $next($request);

        return $next($request);
    }
}
