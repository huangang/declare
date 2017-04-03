<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get(config('admin.prefix') . 'auth/register', function () {
    if(empty(Admin::user())){
        return view('admin.register');
    }
    return redirect('/');
});

Route::post(config('admin.prefix') . 'auth/register', '\App\Admin\Controllers\RegisterController@create');