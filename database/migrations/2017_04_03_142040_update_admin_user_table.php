<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(config('admin.database.users_table'), function (Blueprint $table) {
            $table->integer('student_no')->nullable()->unique()->unsigned()->comment('学号');
            $table->string('mobile',18)->nullable()->unique()->comment('手机号码');
            $table->string('email')->nullable()->unique()->comment('电子邮件');
            $table->integer('college_id')->default(0)->index()->unsigned()->comment('学院ID');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('admin.database.users_table'), function (Blueprint $table) {
            $table->dropColumn([
                'student_no', 'mobile', 'email', 'college_id'
            ]);
        });
    }
}
