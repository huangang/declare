<?php
namespace App\Admin\Request;
use Illuminate\Foundation\Http\FormRequest;
class StoreUserRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username'=>'required|unique:admin_users,username',
			'name'=>'required',
			'password'=>'required|min:6|max:16|confirmed',
			'student_no'=>'required|unique:admin_users,student_no',
			'email'=>'required|unique:admin_users,email',
			'mobile'=>'required|unique:admin_users,mobile|min:11|max:11'
		];
	}
	public function messages()
	{
		return [
			'username.required'=>'用户名不能为空',
			'username.unique'=>'该用户名已被注册',
			'name.required'=>'真实姓名不能为空',
			'password.required'=>'密码不能为空',
			'password.min'=>'密码不能少于6个字符',
			'password.max'=>'密码不能超过16个字符',
			'password.confirmed'=>'重复密码不正确',
			'student_no.required' => '学号不能为空',
			'student_no.unique'=>'该学号已被注册',
			'email.required'=>'邮箱不能为空',
			'email.unique'=>'该邮箱已被注册',
			'mobile.required'=>'联系方式不能为空',
			'mobile.unique'=>'该手机号已被注册',
			'mobile.min'=>'手机号码格式不正确',
			'mobile.max'=>'手机号码格式不正确',
		];
	}
}