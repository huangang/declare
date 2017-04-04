<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $fillable = ['role_id', 'user_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('admin.database.role_users_table');
    }
}
