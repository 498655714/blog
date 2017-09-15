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
// ��֤·��...
Route::get('admin/login', 'Admin\AuthController@getLogin');
Route::post('admin/login', 'Admin\AuthController@postLogin');
Route::get('admin/logout', 'Admin\AuthController@getLogout');
Route::get('admin/validatecode', 'Admin\AuthController@code');
// ע��·��...
Route::post('admin/register', 'Admin\AuthController@postRegister');
//��������·��
Route::post('admin/forgot', 'Admin\AuthController@postForgot');