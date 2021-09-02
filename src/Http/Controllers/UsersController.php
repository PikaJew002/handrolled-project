<?php

namespace App\Http\Controllers;

use App\Models\User;
use PikaJew002\Handrolled\Exceptions;
use Exception;
use PikaJew002\Handrolled\Http\Request;
use PikaJew002\Handrolled\Http\Responses\JsonResponse;
use PikaJew002\Handrolled\Http\Responses\NotFoundResponse;
use PikaJew002\Handrolled\Interfaces\Response;

class UsersController
{
    public function index(Request $request): Response
    {
        $users = User::all();
        return new JsonResponse([
            'users' => $users,
        ]);
    }

    public function view($id, Request $request): Response
    {
        $user = User::findById($id);
        if(is_null($user)) {
            return new NotFoundResponse();
        }
        return new JsonResponse(['user' => $user]);
    }

    public function store(Request $request): Response
    {
        $user = new User;
        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->password_hash = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $user->save();

        return new JsonResponse([
            'user' => $user,
        ], 201);
    }

    public function destroy($id): Response
    {
        $user = User::findById($id);
        if(is_null($user)) {
            return new NotFoundResponse();
        }
        if($user->delete()) {
            return new JsonResponse(['user' => $user]);
        } else {
            throw new Exception('Database eror! Could not delete user!');
        }
    }
}
