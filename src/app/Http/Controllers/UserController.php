<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function me(Request $request): JsonResponse
    {
        $user = $request->user();
        return response()->json([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()
        ]);
    }
}
