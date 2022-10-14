<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminAuthenticate extends Middleware
{
    public function handle($request, $next, ...$guards)
    {
        if (auth('admin')->check()) {
            return $next($request);
        } else {
            return redirect()->route('admin.login.index');
        }
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }
}
