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

    protected $fillable = ['username', 'password', 'name', 'avatar', 'mobile', 'student_no', 'email', 'college_id'];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submit()
    {
        return $this->hasMany(ProjectSubmit::class);
    }
}
