<?php

namespace App\Admin\Controllers;

use App\Administrator;
use App\Http\Controllers\Controller;
use App\RoleUser;

use App\Admin\Request\StoreUserRequest;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function create(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        if( $admin =  Administrator::create($data)){
            RoleUser::create([
                'role_id' => 2,
                'user_id' => $admin->id
            ]);
            return redirect(admin_url('/auth/login'));
        }
    }
}
