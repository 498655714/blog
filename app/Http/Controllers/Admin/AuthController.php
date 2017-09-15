<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Model\Users;
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
        $userinfo = new Users();
        $userinfo = $userinfo->where(['name'=>$info['name'],'password'=>$info['password']])->get()->toArray();
        if(empty($userinfo)){
            return back()->with('msg','用户名或密码错误');
        }
        $_SESSION['name'] = $userinfo[0]['name'];
        return view('admin/index');
    }
    //退出登录
    public function getLogout(){

    }

    //注册操作
    public function postRegister(Request $request){
        echo 111;exit;
        $info = $request->all();
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if( !preg_match( $pattern, $info['email'] ) || is_null($info['email'])){
            return back()->with('msg','您输入的电子邮件地址不合法');
        }
        if( is_null($info['name'])){
            return back()->with('msg','用户名不能为空');
        }
        if( is_null($info['password'])){
            return back()->with('msg','密码不能为空');
        }
        if($info['password'] != $info['repassword']){
            return back()->with('msg','密码与重复密码不一致');
        }
        $userinfo = new Users();
        $userinfo->name = $info['name'];
        $userinfo->email = $info['email'];
        $userinfo->password = md5($info['password']);
        $userinfo->remember_token = $info['_token'];
        $userinfo->created_at = time();
        $userinfo->updated_at = time();
        $userinfo->save();

        return view('admin/login');
    }

    //生成验证码
    public function code(){
        $_vc = new \ValidateCode();      //实例化一个对象
        $_vc->doimg();
        $_SESSION['code'] = $_vc->getCode();//验证码保存到SESSION中
    }

}
