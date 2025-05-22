<?php

namespace App\Repositories\UserRepository;

use App\Models\User;

class UserRepository implements UserRepositoryContract
{

    public function getByEmail(string $email): User
    {
        return User::where('email', $email)->first() ?? User::null();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }
}
