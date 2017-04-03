<?php

namespace App\Admin\Controllers;

use App\Project;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProjectController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('项目');
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

            $content->header('项目');
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

            $content->header('项目');
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
        return Admin::grid(Project::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('项目名');
            $grid->start_time('开始时间');
            $grid->end_time('结束时间');
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
            //搜索
            $grid->filter(function ($filter) {
                $filter->like('name', '项目名');
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Project::class, function (Form $form) {
            $form->text('name', '项目名');
            $form->textarea('body', '项目描述');
            $form->datetime('start_time','开始时间');
            $form->datetime('end_time','结束时间');

            $form->display('id', 'ID');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
