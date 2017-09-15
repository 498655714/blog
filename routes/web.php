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
    return view('admin/login');
});
// 认证路由...
Route::get('admin/login', 'Admin\AuthController@getLogin');
Route::get('admin/index', 'Admin\AuthController@getindex');
Route::post('admin/login', 'Admin\AuthController@postLogin');
Route::get('admin/logout', 'Admin\AuthController@getLogout');
Route::get('admin/validatecode', 'Admin\AuthController@code');
// 注册路由...
Route::post('admin/register', 'Admin\AuthController@postRegister');
//忘记密码路由
Route::post('admin/forgot', 'Admin\AuthController@postForgot');