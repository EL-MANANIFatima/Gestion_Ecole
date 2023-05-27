<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            if ($request->is('/Eleve/dashboard')) {
                return route('type');
            }
            elseif($request->is('/Prof/dashboard')) {
                return route('type');
            }
            elseif($request->is('/Respo/dashboard')) {
                return route('type');
            }
            else {
                return route('type');
            }
        }
    }
}
