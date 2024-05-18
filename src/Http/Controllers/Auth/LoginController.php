<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use PikaJew002\Handrolled\Auth\Edible;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\RedirectResponse;

class LoginController
{
    public function __invoke(Request $request, RedirectResponse $redirectResponse, Edible $edible)
    {
        $user = User::where('email', $request->input('email'))->first();

        if(!is_null($user) && password_verify($request->input('password'), $user->getPasswordHash())) {
            $edible->login($user);
            $request->setUser($user);
            return $redirectResponse->to('/home');
        }

        return $redirectResponse->to('/login?message=' . rawurlencode('Invalid username, password combination'));
    }
}
