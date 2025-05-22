<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\User;
use App\Repositories\RoleRepository\RoleRepositoryContract;
use App\Repositories\UserRepository\UserRepositoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class RolesController extends Controller
{
    public function setRole(Request $request): JsonResponse
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = app(UserRepositoryContract::class)->getByEmail($request->get('email'));

        $role = app(RoleRepositoryContract::class)->getById((int)$request->get('role_id'));

        $user->setRole($role);

        $user->save();

        return response()->json([
            'message' => 'Role has been set'
        ]);
    }

    public function index(): JsonResponse
    {
        return response()->json(app(RoleRepositoryContract::class)->getAll());
    }

}
