<?php

namespace App\Admin\Controllers;

use App\Admin\Traits\RoleTrait;
use App\Project;
use App\ProjectSubmit;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProjectSubmitController extends Controller
{
    use ModelForm, RoleTrait;


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
            $grid->project()->name('项目类型');
            $grid->title('作品名称');
//            $grid->end_time('截止时间')->display(function ()  {
//                // echo $end_time  = (String) $project['end_time'];
//                return '前往首页查看';
//            });
            $grid->body('作品描述')->limit(20);
            if($this->getRole()->slug !== 'administrator'){
                $grid->disableExport();
                $grid->tools(function ($tools) {
                    $tools->batch(function ($batch) {
                        $batch->disableDelete();
                    });
                });
                $grid->project()->end_time('截止时间');
                $grid->model()->where('user_id', Admin::user()->id);
                $grid->is_passed('状态')->display(function ($value) {
                    if($value == ProjectSubmit::IN_REVIEW){
                        return "<span style='color:blue'>审核中</span>";
                    }elseif($value == ProjectSubmit::PASS){
                        return "<span style='color:green'>通过</span>";
                    }else{
                        return "<span style='color:red'>未通过</span>";
                    }
                });
                $grid->actions(function ($actions) {
                    if($actions->row->is_passed == ProjectSubmit::PASS || $actions->row->project['end_time'] < date('Y-m-d')){
                        $actions->disableDelete();
                        $actions->disableEdit();
                        $actions->append('<a href="' . config('admin.upload.host') . '/' . $this->row->file .'" target="_blank">下载</a>');
                    }
                });
            }else{
                $grid->exporter(new CustomExporter());
                //grid()->exporter(new CustomExporter());
                $grid->disableCreation();
                $grid->actions(function ($actions) {
                    $actions->disableDelete();
                    $actions->disableEdit();
                    $actions->append('<a href="' . config('admin.upload.host') . '/' . $this->row->file .'" target="_blank">下载</a>');
                });
                $grid->user('提交用户')->display(function ($user) {
                    return $user['name'];
                });
                $grid->is_passed('状态')->select([
                    ProjectSubmit::IN_REVIEW => '审核中',
                    ProjectSubmit::PASS => '通过',
                    ProjectSubmit::NOT_PASS => '未通过',
                ]);

            }
            $grid->filter(function ($filter) {
                $filter->like('project.name', '项目名称');
            });
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
                /** @var  \Illuminate\Http\UploadedFile $file */
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
