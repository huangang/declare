<?php

namespace App;
use Encore\Admin\Auth\Database\Administrator as Admin;
use Encore\Admin\Auth\Database\Role;


/**
 * Class Administrator.
 *
 * @property Role[] $roles
 */
class Administrator extends Admin
{

    protected $fillable = ['username', 'password', 'name', 'avatar', 'mobile', 'student_no', 'email'];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
