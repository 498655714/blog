<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Model\PasswordResets;
use App\Model\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
require_once ROOT_PATH.'/../resources/org/ValidateCode.class.php';
require_once ROOT_PATH.'/../resources/org/Smtpmail.class.php';
class AuthController extends CommonController
{
    //首页
    public function getindex(){
        return view('admin/index');
    }
    //登录界面
    public function  getLogin(){
        $name = $_COOKIE['name']?$_COOKIE['name']:'';
        $pwd =  $_COOKIE['pwd']?$_COOKIE['pwd']:'';
        return view('admin/login',compact('name','pwd'))->with('clip','login');
    }
    //登录操作
    public function postLogin(Request $request,Response $response){
        $info = $request->all();
        if(strtolower($info['validatecode']) != $_SESSION['code']){
            return back()->with('msg','验证码错误')->with('clip','login');
        }
        if(is_null($info['name'])){
            return back()->with('msg','用户名不能为空')->with('clip','login');
        }
        if(is_null($info['password'])){
            return back()->with('msg','密码不能为空')->with('clip','login');
        }
        $userinfo = new Users();
        $userinfo = $userinfo->where(['name'=>$info['name'],'password'=>md5($info['password'])])->get()->toArray();
        if(empty($userinfo)){
            return back()->with('msg','用户名或密码错误')->with('clip','login');
        }
        $request->session()->put('name', $info['name']);
        setcookie("pwd",$info['password'],time()+(60*24*30),"/");
        setcookie("name",$info['name'],time()+(60*24*30),"/");
        return view('admin/index');
    }
    //退出登录
    public function getLogout(Request $request){
        $request->session()->forget('name');
        return view('admin/login')->with('clip','login');
    }

    //注册操作
    public function postRegister(Request $request){
        $info = $request->all();
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if( !preg_match( $pattern, $info['email'] ) || is_null($info['email'])){
            return back()->with('msg','您输入的电子邮件地址不合法')
                ->with('clip','register');
        }
        if( is_null($info['name'])){
            return back()->with('msg','用户名不能为空')->with('clip','register');
        }
        if( is_null($info['password'])){
            return back()->with('msg','密码不能为空')->with('clip','register');
        }
        if($info['password'] != $info['repassword']){
            return back()->with('msg','密码与重复密码不一致')->with('clip','register');
        }
        $userinfo = new Users();
        $userinfo->name = $info['name'];
        $userinfo->email = $info['email'];
        $userinfo->password = md5($info['password']);
        $userinfo->remember_token = $info['_token'];
        $userinfo->created_at = time();
        $userinfo->updated_at = time();
        $check = $userinfo->where('email',$info['email'])->get()->toArray();
        if(!empty($check[0])){
            return back()->with('msg','您输入的电子邮件地址已存在')->with('clip','register');
        }
        $user = $userinfo->save();
        if($user){
            $title = '注册成功';
            $contentTitle = '恭喜你成功注册';
            $contents = [
                '首先恭喜你注册为本博客系统会员',
                '本博客系统为开源项目，开源地址：<a href="https://github.com/498655714/blog" target=_blank>https://github.com/498655714/blog</a>',
                '希望你也能发扬开源精神多发几篇好文章.',
            ];
            $_SESSION['name'] = $info['name'];
            $url = "{{url('admin/index')}}";
            $handles = ["<a href='$url'>直接登录</a>"];
            return view('common/success',compact('title','contentTitle','contents','handles'));
        }
        $title = '注册失败';
        $contentTitle = '注册失败了';
        $contents = [
            '首先检查你填入的信息是否正确',
            '可以联系管理员帮助你 QQ:498655714',
        ];
        $handles = [];
        return view('common/error',compact('title','contentTitle','contents','handles'));
    }

    //生成验证码
    public function code(){
        $_vc = new \ValidateCode();      //实例化一个对象
        $_vc->doimg();
        $_SESSION['code'] = $_vc->getCode();//验证码保存到SESSION中
    }

    //忘记密码重置
    public function postForgot(Request $request){
        $info = $request->all();
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if( !preg_match( $pattern, $info['email'] ) || is_null($info['email'])){
            return back()->with('msg','您输入的电子邮件地址不合法')
                ->with('clip','forgot');
        }
        $userinfo = new Users();
        $ret = $userinfo->where('email',$info['email'])->get()->toArray();
        if(empty($ret[0])){
            return back()->with('msg','您输入的电子邮件地址的博客用户不存在')
                ->with('clip','forgot');
        }
        //这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $smtp = new \Smtpmail();
        $mailtitle = '个人博客密码重置';
        $mailcontent = "你的密码已经重置，密码是：123456 ";
        $state = $smtp->sendmail($info['email'],$mailtitle,$mailcontent);
        if(!$state){
            $title = '邮件发送失败';
            $contentTitle = '邮件发送失败了';
            $contents = [
                '首先检查你填入的邮件地址是否正确',
                '可以联系管理员帮助你 QQ:498655714',
            ];
            $handles = [];
            return view('common/error',compact('title','contentTitle','contents','handles'));
        }
        //修改密码
        $userinfo->where('email',$info['email'])->update(['password'=>md5('123456'),'updated_at'=>date('Y-m-d H:i:s',time())]);
        //记录发送邮件号码

        $passinfo = new PasswordResets();
        $pass = $passinfo->where(['send_number' => $info['email']])->get()->toArray();
        if(empty($pass[0])){
            $passinfo->send_number=$info['email'];
            $passinfo->token=$info['_token'];
            $passinfo->save();
        }else{
            $passinfo->where('send_number',$info['email'])->update(['token'=>$info['_token'],'created_at'=>date('Y-m-d H:i:s',time())]);
        }
        $title = '邮件发送成功';
        $contentTitle = '邮件发送成功';
        $contents = [
            '邮件已经发送成功',
            '你可以根据邮件里的找回密码',
        ];
        $handles = [];
        return view('common/success',compact('title','contentTitle','contents','handles'));
    }
}
