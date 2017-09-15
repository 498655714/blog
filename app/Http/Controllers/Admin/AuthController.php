<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Model\PasswordResets;
use App\Model\Users;
use Illuminate\Http\Request;
require_once ROOT_PATH.'/../resources/org/ValidateCode.class.php';
require_once ROOT_PATH.'/../resources/org/Smtp.class.php';
class AuthController extends CommonController
{
    //首页
    public function getindex(){
        return view('admin/index');
    }
    //登录界面
    public function  getLogin(){
        return view('admin/login')->with('clip','login');
    }
    //登录操作
    public function postLogin(Request $request){
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
        $_SESSION['name'] = $userinfo[0]['name'];
        return view('admin/index');
    }
    //退出登录
    public function getLogout(){
        isset($_SESSION['username']);
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
                '1.首先恭喜你注册为本博客系统会员',
                '2.本博客系统为开源项目，开源地址：<a href="https://github.com/498655714/blog">https://github.com/498655714/blog</a>',
                '3.希望你也能发扬开源精神多发几篇好文章.',
            ];
            $_SESSION['name'] = $info['name'];
            $url = "{{url('admin/index')}}";
            $handles = ["<a href='$url'>直接登录</a>"];
            return view('common/success',compact('title','contentTitle','contents','handles'));
        }
        $title = '注册失败';
        $contentTitle = '注册失败了';
        $contents = [
            '1.首先检查你填入的信息是否正确',
            '2.可以联系管理员帮助你 QQ:498655714',
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
        $smtpconf = include_once ROOT_PATH.'/../config/smtp.php';

        //这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $smtp = new Smtp($smtpconf['smtpserver'],$smtpconf['smtpserverport'],true,$smtpconf['smtpuser'],$smtpconf['smtppass']);
        $smtp->debug = false;//是否显示发送的调试信息
        $mailtitle = '';
        $mailcontent = '';
        $state = $smtp->sendmail($info['email'], $smtpconf['smtpusermail'], $mailtitle, $mailcontent, $smtpconf['mailtype']);
        if($state==""){
            $title = '邮件发送失败';
            $contentTitle = '邮件发送失败了';
            $contents = [
                '1.首先检查你填入的邮件地址是否正确',
                '2.可以联系管理员帮助你 QQ:498655714',
            ];
            $handles = [];
            return view('common/error',compact('title','contentTitle','contents','handles'));
        }

        //记录发送邮件号码
        $passinfo = new PasswordResets();
        $passinfo->updateOrCreate( ['email' => $info['email'], 'token' => $info['_token'],'created_at'=>time()], ['email' => $info['email']]);
        $title = '邮件发送成功';
        $contentTitle = '邮件发送成功';
        $contents = [
            '1.邮件已经发送成功',
            '2.你可以根据邮件里的找回密码',
        ];
        $handles = [];
        return view('common/success',compact('title','contentTitle','contents','handles'));
    }
}
