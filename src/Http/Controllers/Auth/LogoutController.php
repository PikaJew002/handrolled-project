<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use PikaJew002\Handrolled\Auth\Manager as AuthManager;
use PikaJew002\Handrolled\Exceptions\HttpException;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\JsonResponse;
use PikaJew002\Handrolled\Http\Responses\RequestTimedOutResponse;

class LogoutController
{
    public function __invoke(Request $request, AuthManager $auth)
    {
        if(User::hasAuthCookie($request)) {
            User::invalidateAuthCookie($auth);
            return new JsonResponse(['Successfully logged out.']);
        }
        return new RequestTimedOutResponse();
    }
}
