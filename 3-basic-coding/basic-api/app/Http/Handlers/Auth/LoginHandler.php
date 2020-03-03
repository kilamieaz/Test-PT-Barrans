<?php

namespace App\Http\Handlers\Auth;

use App\Jobs\AuthLogin;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class LoginHandler
{
    public function __invoke(Request $request)
    {
        $user = AuthLogin::dispatchNow($request->all());
        $token = $user->createToken('auth:login');
        return (new UserResource($user))
        ->additional(['accessToken' => $token->plainTextToken]);
    }
}
