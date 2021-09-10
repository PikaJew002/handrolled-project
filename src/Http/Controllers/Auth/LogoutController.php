<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use PikaJew002\Handrolled\Auth\Manager as AuthManager;
use PikaJew002\Handrolled\Http\Exceptions\HttpException;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\JsonResponse;
use PikaJew002\Handrolled\Http\Responses\HttpErrors\RequestTimeoutResponse;

class LogoutController
{
    public function __invoke(Request $request, AuthManager $auth)
    {
        if(User::hasAuthEdible($request)) {
            User::invalidateAuthEdible($auth);
            return new JsonResponse(['Successfully logged out.']);
        }
        return new RequestTimeoutResponse();
    }
}
