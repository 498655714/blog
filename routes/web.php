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
//后端路由定义中间件
Route::group(['middleware'=>['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function(){

    Route::get('index', 'IndexController@getindex');//首页
    Route::get('parents', 'IndexController@parents');//欢迎界面
    Route::get('logout', 'AuthController@getLogout');//退出
    Route::get('showpass', 'IndexController@showpass');//修改密码页
    Route::post('changepass', 'IndexController@changepass');//修改密码
    Route::post('cate/vieworder', 'CategoryController@vieworder');//修改排序
    Route::post('article/imgtoup', 'ArticleController@imgtoup');//图片上传异步
    Route::get('tag/index', 'TagController@index');//标签页面
    Route::post('tag/edit', 'TagController@edit');//标签编辑和增加

    //资源路由
    Route::resource('category','CategoryController');   //分类
    Route::resource('article','ArticleController');     //文章

});

//前端路由
Route::group(['middleware'=>['web','main'],'prefix'=>'main','namespace'=>'Main'],function(){

    Route::get('index','IndexController@getindex'); //博客首页
    Route::get('detail/{art_id}','IndexController@getdetail'); //博客首页内容页
});

// 登录路由...
Route::get('admin/login', 'Admin\AuthController@getLogin');
Route::post('admin/login', 'Admin\AuthController@postLogin');
Route::get('admin/validatecode', 'Admin\AuthController@code');
// 注册路由...
Route::post('admin/register', 'Admin\AuthController@postRegister');
//忘记密码路由
Route::post('admin/forgot', 'Admin\AuthController@postForgot');