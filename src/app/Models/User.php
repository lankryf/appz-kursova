<?php

namespace App\Models;

use App\Traits\NullObject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, NullObject;

    protected $guarded = [];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function role(): BelongsTo
    {
        return $this->BelongsTo(Role::class);
    }

    public function getRole(): Role
    {
        return $this->role ?? Role::null();
    }

    public function getPasswordHash(): string
    {
        return $this->password;
    }

    public function getName(): string
    {
        return (string)$this->name;
    }

    public function getEmail(): string
    {
        return (string)$this->email;
    }

    public function getId(): int
    {
        return (int)$this->id;
    }
}
