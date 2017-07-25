<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$permissions)
    {
        if($user = $request->user()) {
            $permissions = $permissions ?: [$request->route()->getName()];
            if($user->hasPermission($permissions)) {
                return $next($request);
            }
            return $this->unauthorizedResponse($request);
        }

        return $this->unauthenticatedResponse($request);
    }

    private function unauthorizedResponse($request)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
        return abort(403);
    }

    private function unauthenticatedResponse($request)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        return redirect()->guest(route('login'));
    }
}
