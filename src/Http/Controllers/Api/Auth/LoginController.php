<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use PikaJew002\Handrolled\Auth\Edible;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\JsonResponse;
use PikaJew002\Handrolled\Http\Responses\HttpErrors\ForbiddenResponse;
use PikaJew002\Handrolled\Interfaces\Response;

class LoginController
{
    public function __invoke(Request $request,Edible $edible, JsonResponse $response, ForbiddenResponse $forbiddenResponse): Response
    {
        $user = User::where('email', $request->input('email'))->first();

        if(!is_null($user) && password_verify($request->input('password'), $user->getPasswordHash())) {
            $edible->login($user);
            $request->setUser($user);

            return $response->with([
              'user' => $user->toArray(),
            ]);
        }

        return $forbiddenResponse;
    }
}
