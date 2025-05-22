<?php

namespace App\Repositories\UserRepository;

use App\Models\User;

interface UserRepositoryContract
{
    public function getByEmail(string $email): User;

    public function create(array $data): User;
}
