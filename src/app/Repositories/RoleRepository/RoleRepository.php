<?php

namespace App\Repositories\RoleRepository;

use App\Models\Role;
use Illuminate\Support\Collection;

class RoleRepository implements RoleRepositoryContract
{
    public function create(array $data): Role
    {
        return Role::create($data);
    }

    public function delete(Collection $ids): void
    {
        Role::destroy($ids);
    }

    public function getAll(): Collection
    {
        return Role::all();
    }

    public function getById(int $id): Role
    {
        return Role::find($id) ?? Role::null();
    }
}
