<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Exception;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\HttpErrors\NotFoundResponse;
use PikaJew002\Handrolled\Http\Responses\JsonResponse;
use PikaJew002\Handrolled\Interfaces\Response;

class UsersController
{
    public function index(JsonResponse $response): Response
    {
        $users = User::all();

        return $response->with([
            'users' => array_map(function ($user) {
                return $user->toArray();
            }, $users),
        ]);
    }

    public function view($id, JsonResponse $response, NotFoundResponse $notFoundResponse): Response
    {
        $user = User::findById($id);

        if(is_null($user)) {
            return $notFoundResponse;
        }

        return $response->with(['user' => $user->toArray()]);
    }

    public function store(Request $request, JsonResponse $response): Response
    {
        $user = new User;
        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->password_hash = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $user->save();

        return $response->setCode(201)->with([
            'user' => $user->toArray(),
        ]);
    }

    public function destroy($id, JsonResponse $response, NotFoundResponse $notFoundResponse): Response
    {
        $user = User::findById($id);
        if(is_null($user)) {
            return $notFoundResponse;
        }
        if($user->delete()) {
            return $response->with(['user' => $user->toArray()]);
        } else {
            throw new Exception('Database eror! Could not delete user!');
        }
    }
}
