<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use PikaJew002\Handrolled\Auth\Manager as AuthManager;
use PikaJew002\Handrolled\Exceptions\HttpException;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\JsonResponse;

class LoginController
{
    public function __invoke(Request $request, AuthManager $auth)
    {
        $user = User::checkCredentials($request->input('email'), $request->input('password'));
        if(!is_null($user)) {
            $user->setAuthCookie($request, $auth);
            $request->setUser($user);
            return new JsonResponse([
              'user' => $user,
            ]);
            throw new HttpException(403, 'Session already set!');
        }
        throw new HttpException(403, 'Invalid username, password combo');
    }
}
