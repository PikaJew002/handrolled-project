<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use PikaJew002\Handrolled\Auth\Manager as AuthManager;
use PikaJew002\Handrolled\Http\Exceptions\HttpException;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\JsonResponse;
use PikaJew002\Handrolled\Http\Responses\HttpErrors\ForbiddenResponse;

class LoginController
{
    public function __invoke(Request $request, AuthManager $auth)
    {
        $user = User::checkCredentials($request->input('email'), $request->input('password'));
        if(!is_null($user)) {
            $user->setAuthEdible($request, $auth);
            $request->setUser($user);
            return new JsonResponse([
              'user' => $user,
            ]);
        }
        return new ForbiddenResponse('Invalid username, password combination');
    }
}
