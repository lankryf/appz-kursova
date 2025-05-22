<?php

use App\Models\Role;
use App\Repositories\RoleRepository\RoleRepositoryContract;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const ROLES_TO_INSERT = [
        Role::ADMIN_ROLE_ID => Role::ADMIN_ROLE_NAME,
        Role::USER_ROLE_ID => Role::USER_ROLE_NAME,
        Role::GUEST_ROLE_ID => Role::GUEST_ROLE_NAME,
        Role::MANAGER_ROLE_ID => Role::MANAGER_ROLE_NAME,
    ];
    public function up(): void
    {
        foreach (self::ROLES_TO_INSERT as $roleId => $roleName) {
            app(RoleRepositoryContract::class)->create([
                'id' => $roleId,
                'name' => $roleName,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        app(RoleRepositoryContract::class)->delete(collect(self::ROLES_TO_INSERT)->keys());
    }
};
