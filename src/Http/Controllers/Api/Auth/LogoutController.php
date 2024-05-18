<?php

namespace App\Http\Controllers\Api\Auth;

use PikaJew002\Handrolled\Auth\Edible;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\JsonResponse;
use PikaJew002\Handrolled\Http\Responses\HttpErrors\RequestTimeoutResponse;
use PikaJew002\Handrolled\Interfaces\Response;

class LogoutController
{
    public function __invoke(Request $request, Edible $edible, JsonResponse $response, RequestTimeoutResponse $requestTimeoutResponse): Response
    {
        if($request->hasCookie('puff_puff_pass')) {
            $edible->logout();
            return $response->with(['Successfully logged out.']);
        }
        return $requestTimeoutResponse;
    }
}
