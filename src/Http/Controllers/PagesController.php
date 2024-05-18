<?php

namespace App\Http\Controllers;

use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\ViewResponse;
use PikaJew002\Handrolled\Interfaces\Response;

class PagesController
{
    public function index(Request $request, ViewResponse $response): Response
    {
        return $response->use('home.twig.html', ['user' => $request->user()]);
    }

    public function login(Request $request, ViewResponse $response): Response
    {
        $props = [];
        if($request->hasQuery('message')) {
            $props['message'] = $request->input('message');
        }

        return $response->use('auth/login.twig.html', $props);
    }
}
