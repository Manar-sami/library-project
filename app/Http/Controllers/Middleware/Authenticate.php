<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // لو الرابط للمؤلف أو أي مسار، رجعه لتسجيل دخول المؤلف
            if ($request->is('author') || $request->is('author/*')) {
                return route('author.login');
            }

            // لو عندك مستخدمين عاديين، ممكن ترجعهم لمسار login العادي هنا
            // لكن بما إنه مش موجود عندك، ممكن تخليه يرجع لمسار المؤلف برضه
            return route('author.login');
        }
    }
}

