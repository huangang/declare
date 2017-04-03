<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_submits', function (Blueprint $table) {
            $table->increments('id')->comment('提交ID');
            $table->integer('project_id')->unsigned()->index()->comment('关联项目ID');
            $table->integer('user_id')->unsigned()->index()->comment('用户ID');
            $table->string('title', 50)->index()->comment('作品标题');
            $table->string('body', 50)->index()->comment('作品描述');
            $table->string('tutor', 8)->comment('指导老师');
            $table->string('file')->comment('作品文件');
            $table->tinyInteger('is_passed')->default(0)->index()->comment('是否通过');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_submits');
    }
}
