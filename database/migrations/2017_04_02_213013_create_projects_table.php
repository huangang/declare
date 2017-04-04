<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->comment('项目ID');
            $table->string('name', 20)->index()->comment('项目名');
            $table->text('body')->comment('项目描述');
            $table->timestamp('start_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('开始时间');
            $table->timestamp('end_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('结束时间');
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
        Schema::dropIfExists('projects');
    }
}
