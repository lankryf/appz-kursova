<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Repositories\RoleRepository\RoleRepositoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me(): JsonResponse
    {
        $user = auth('sanctum')->user();
        if (is_null($user)) {
            return response()->json([
            'id' => null,
            'name' => null,
            'email' => null,
            'role' => app(RoleRepositoryContract::class)->getById(Role::GUEST_ROLE_ID)
        ]);
        }
        return response()->json([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()
        ]);
    }
}
