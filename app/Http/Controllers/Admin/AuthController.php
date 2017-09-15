<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Model\User;
use Illuminate\Http\Request;
require_once ROOT_PATH.'/../resources/org/ValidateCode.class.php';
class AuthController extends CommonController
{
    //登录界面
    public function  getLogin(){
        return view('admin/login');
    }
    //登录操作
    public function postLogin(Request $request){
        $info = $request->all();
        if(strtolower($info['validatecode']) != $_SESSION['code']){
            return back()->with('msg','验证码错误');
        }
        if(is_null($info['name'])){
            return back()->with('msg','用户名不能为空');
        }
        if(is_null($info['password'])){
            return back()->with('msg','密码不能为空');
        }
        $userinfo = new User();
        $userinfo = $userinfo->where(['name'=>$info['name'],'password'=>$info['password']])->get()->toArray();
        dd($userinfo);
        return view('admin/index');
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
