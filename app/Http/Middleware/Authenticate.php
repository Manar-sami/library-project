<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            if ($request->is('author') || $request->is('author/*')) {
                return route('author.login');
            }

            return route('author.login');
        }
    }
}

