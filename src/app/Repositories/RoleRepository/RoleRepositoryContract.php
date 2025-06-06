<?php

namespace App\Repositories\RoleRepository;

use App\Models\Role;
use Illuminate\Support\Collection;

interface RoleRepositoryContract
{
    public function create(array $data): Role;

    public function delete(Collection $ids): void;

    public function getAll(): Collection;

    public function getById(int $id): Role;

}
