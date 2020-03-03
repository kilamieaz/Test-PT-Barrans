<?php

namespace App\Http\Handlers\Auth;

use Auth;
use Illuminate\Http\Request;

class LogoutHandler
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
