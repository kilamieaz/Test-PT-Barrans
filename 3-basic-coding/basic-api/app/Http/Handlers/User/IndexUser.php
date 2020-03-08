<?php

namespace App\Http\Handlers\User;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use App\Filters\UserFilter;

class IndexUser
{
    protected $user = null;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function __invoke(Request $request)
    {
        $user = UserFilter::apply($request->all());
        return UserResource::collection($user);
    }
}
