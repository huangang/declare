<?php
namespace App\Admin\Traits;


use App\RoleUser;
use Encore\Admin\Auth\Database\Role;

trait RoleTrait
{
    protected $role;

    /**
     * 获取角色
     * @param integer $user_id 用户ID
     * @return mixed
     */
    public function getRole($user_id = 0)
    {
        if(empty($this->role)){
            if(empty($user_id)){
                $user_id = \Admin::user()->id;
            }
            $roleUser = RoleUser::where('user_id', $user_id)->first();
            $this->role = Role::find($roleUser->role_id);
        }
        return $this->role;
    }
}