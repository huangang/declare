<?php

namespace App\Admin\Controllers;

use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{

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
            $form->text('name', trans('admin::lang.name'))->rules('required');
            $form->image('avatar', trans('admin::lang.avatar'))->options(['showRemove' => false])->name(function($file){
                return time() . rand(1000, 9999) . '.' . $file->guessExtension();
            });
            $form->password('password', trans('admin::lang.password'))->rules('confirmed|required');
            $form->password('password_confirmation', trans('admin::lang.password_confirmation'))->rules('required')
                ->default(function ($form) {
                    return $form->model()->password;
                });

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
