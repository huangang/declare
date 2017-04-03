<?php

namespace App\Admin\Controllers;

use App\Administrator;
use App\Http\Controllers\Controller;
use App\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @internal param array $data
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $this->validator($data);
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
