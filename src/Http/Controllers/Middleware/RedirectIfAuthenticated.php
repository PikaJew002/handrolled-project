<?php

namespace App\Http\Middleware;

use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\RedirectResponse;
use PikaJew002\Handrolled\Interfaces\Middleware;

class RedirectIfAuthenticated implements Middleware
{
    public function __construct(protected RedirectResponse $redirectResponse) {}

    public function handler(Request $request, callable $next)
    {
        if (!is_null($request->user())) {
            return $this->redirectResponse->to('/home');
        }

        return $next($request);
    }
}
