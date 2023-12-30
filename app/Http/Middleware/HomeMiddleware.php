<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class HomeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $roles = ['editor', 'author'];
        $userId = $request->id;
        if ($userId < 6 || !in_array($role, $roles)) {
            return redirect('welcome');
        }
        return $next($request);
    }
}
