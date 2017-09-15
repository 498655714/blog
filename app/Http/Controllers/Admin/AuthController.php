<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
require_once ROOT_PATH.'/../resources/org/ValidateCode.class.php';
class AuthController extends CommonController
{
    //登录界面
    public function  getLogin(){
        return view('admin/login');
    }
    //登录操作
    public function postLogin(){
        $info = Input::all();
        dd($info);
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

    //生成验证码
    public function code(){
        $_vc = new \ValidateCode();      //实例化一个对象
        $_vc->doimg();
        $_SESSION['code'] = $_vc->getCode();//验证码保存到SESSION中
    }

}
