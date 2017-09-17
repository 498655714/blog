<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/17
 * Time: 0:56
 */
namespace App\Http\Controllers\Admin;
use \App\Http\Controllers\Admin\CommonController;
use App\Model\Users;
use Validator;
use Illuminate\Http\Request;
class IndexController extends CommonController{
    //首页
    public function getindex(){
        $navigation = array();
        $contenttitle_1 = '管理后台首页';
        $contenttitle_2 = '欢迎界面';
        return view('admin/index',
            [   'navigation'=>$navigation,
                'contenttitle_1'=>$contenttitle_1,
                'contenttitle_2'=>$contenttitle_2
            ]);
    }

    //更改密码页面
    public function showpass(){
        $navigation = ['密码修改页'];
        $contenttitle_1 = '密码修改';
        $contenttitle_2 = '修改个人密码';
        return view('admin.changepass',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2
        ]);
    }
    //更改密码操作
    public function changepass(Request $request){
        $info = $request->all();
        $rules = [
            'password'=>'required|between:6,20|confirmed',
        ];
        $message = [
            'password.required'=>'新密码不能为空',
            'password.between'=>'新密码必须在6-20位之间',
            'password.confirmed'=>'新密码和确认密码不一致',
        ];
        $validator = Validator::make($info,$rules,$message);
        if($validator->passes()){
            $userinfo = new Users();
            $ret = $userinfo->where(['name'=>session('name'),'password'=>$info['oldpass']])->get()->toArray();
            if(!empty($ret[0])){
                $userinfo->where(['name'=>session('name'),'password'=>$info['oldpass']])->update(['password'=>md5($info['password'])]);
                return redirect('admin.index');
            }else{
                return back()->with('errors','原始密码不能为空');
            }
        }else{
            return back()->withErrors($validator);
        }
    }
}