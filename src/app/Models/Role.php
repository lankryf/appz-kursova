<?php

namespace App\Models;

use App\Traits\NullObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, NullObject;

    protected $guarded = [];

    public $timestamps = false;

    public const GUEST_ROLE_NAME = 'guest';

    public const ADMIN_ROLE_NAME = 'admin';

    public const USER_ROLE_NAME = 'user';

    public const MANAGER_ROLE_NAME = 'manager';

    public const GUEST_ROLE_ID = 1;

    public const ADMIN_ROLE_ID = 4;

    public const USER_ROLE_ID = 2;

    public const MANAGER_ROLE_ID = 3;

    public function getName(): string
    {
        return $this->name;
    }
}
