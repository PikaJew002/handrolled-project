<?php

namespace App\Http\Controllers\Auth;

use PikaJew002\Handrolled\Auth\Edible;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\HttpErrors\RequestTimeoutResponse;
use PikaJew002\Handrolled\Http\Responses\RedirectResponse;

class LogoutController
{
    public function __invoke(Request $request, RedirectResponse $redirect, RequestTimeoutResponse $timeoutResponse, Edible $edible)
    {
        if($request->hasCookie('puff_puff_pass')) {
            $edible->logout();
            return $redirect->to('/');
        }
        
        return $timeoutResponse;
    }
}
