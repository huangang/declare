<?php

namespace App\Admin\Controllers;

use App\Project;
use App\ProjectSubmit;

use App\RoleUser;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProjectSubmitController extends Controller
{
    use ModelForm;

    protected $role;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('项目提交');
            $content->description('列表');

            $content->body($this->grid());
        });
    }

    public function getRole()
    {
        if(empty($this->role)){
            $roleUser = RoleUser::where('user_id', Admin::user()->id)->first();
            $this->role = Role::find($roleUser->role_id);
        }
        return $this->role;
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('项目提交');
            $content->description('列表');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('项目提交');
            $content->description('列表');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(ProjectSubmit::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('标题');

            if($this->getRole()->slug !== 'administrator'){
                $grid->model()->where('user_id', Admin::user()->id);
                $grid->is_passed('状态')->display(function ($value) {
                    if($value == 0){
                        return "<span style='color:blue'>审核中</span>";
                    }elseif($value == 1){
                        return "<span style='color:green'>通过</span>";
                    }else{
                        return "<span style='color:red'>未通过</span>";

                    }
                });
            }else{
                $grid->disableCreation();

                $grid->tools(function ($tools) {
                    $tools->batch(function ($batch) {
                        $batch->disableDelete();
                    });
                });
                $grid->actions(function ($actions) {
                    $actions->disableDelete();
                    $actions->disableEdit();
                    $actions->append('<a href=""><i class="fa fa-paper-plane"></i></a>');

                });
                $grid->is_passed('状态')->select([
                    0 => '审核中',
                    1 => '通过',
                    -1 => '未通过',
                ]);

            }
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(ProjectSubmit::class, function (Form $form) {
            $projects = Project::where('start_time', '<=', date('Y-m-d'))->where('end_time', '>=', date('Y-m-d'))
                ->get();
            $options = [];
            foreach ($projects as $project){
                $options[$project->id] = $project->name;
            }

            $form->select('project_id', '项目')->options($options);

            $form->text('title', '标题');
            $form->textarea('body', '描述');
            $form->file('file', '附件')->options(['showRemove' => false])->name(function($file){
                return time() . rand(1000, 9999) . '.' . $file->guessExtension();
            });
            $form->text('tutor', '指导老师');
            $form->display('id', 'ID');
            $form->hidden('is_passed')->default(0);
            $form->hidden('user_id')->default(Admin::user()->id);
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
