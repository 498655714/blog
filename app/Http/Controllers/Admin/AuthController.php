<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;

class AuthController extends ControllerController
{
    //登录界面
    public function  getLogin(){
        return view('admin/login');
    }
    //登录操作
    public function postLogin(){

    }
    //退出登录
    public function getLogout(){

    }
    //注册界面
    public function getRegister(){

    }
    //注册操作
    public function postRegister(){

    }
}
