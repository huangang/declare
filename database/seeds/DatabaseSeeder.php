<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 先执行 composer dump-autoload
     * php artisan db:seed --class=DatabaseSeeder
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents(base_path()."/database/seeds/data.sql"));
    }
}
