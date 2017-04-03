<?php

namespace App\Admin\Controllers;

use App\Admin\Traits\RoleTrait;
use App\College;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{

    use RoleTrait;

    /**
     * User setting page.
     *
     * @return mixed
     */
    public function getSetting()
    {
        return Admin::content(function (Content $content) {
            $content->header(trans('admin::lang.user_setting'));
            $content->body($this->settingForm()->edit(Admin::user()->id));
        });
    }

    /**
     * Update user setting.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function putSetting()
    {
        return $this->settingForm()->update(Admin::user()->id);
    }

    /**
     * Model-form for user setting.
     *
     * @return Form
     */
    protected function settingForm()
    {
        return Administrator::form(function (Form $form) {
            $form->display('username', trans('admin::lang.username'));
            $form->text('name', '真实姓名')->rules('required');
            $form->image('avatar', trans('admin::lang.avatar'))->options(['showRemove' => false])->name(function($file){
                return time() . rand(1000, 9999) . '.' . $file->guessExtension();
            });

            $form->password('password', trans('admin::lang.password'))->rules('confirmed|required');
            $form->password('password_confirmation', trans('admin::lang.password_confirmation'))->rules('required')
                ->default(function ($form) {
                    return $form->model()->password;
                });
            if($this->getRole()->slug !== 'administrator') {
                $form->text('student_no','学号');
                $form->mobile('mobile','手机号码');
                $form->email('email', '邮箱');
                $colleges = College::all();
                $options = [];
                foreach ($colleges as $college){
                    $options[$college->id] = $college->name;
                }
                $form->select('college_id', '学院')->options($options);
            }

            $form->setAction(admin_url('auth/setting'));

            $form->ignore(['password_confirmation']);

            $form->saving(function (Form $form) {
                if ($form->password && $form->model()->password != $form->password) {
                    $form->password = bcrypt($form->password);
                }
            });

            $form->saved(function () {
                admin_toastr(trans('admin::lang.update_succeeded'));

                return redirect(admin_url('auth/setting'));
            });
        });
    }

}
