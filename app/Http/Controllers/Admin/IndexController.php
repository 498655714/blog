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
        return view('admin/index');
    }

    public function parents(){
        $navigation = array();
        $contenttitle_1 = '管理后台首页';
        $contenttitle_2 = '欢迎界面';
        return view('admin/parents',
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

        $navigation = ['密码修改页'];
        $contenttitle_1 = '密码修改';
        $contenttitle_2 = '修改个人密码';
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
            $ret = $userinfo->where(['name'=>session('name'),'password'=>md5($info['oldpass'])])->get()->toArray();
            if(!empty($ret[0])){
                $res = $userinfo->where(['name'=>session('name'),'password'=>md5($info['oldpass'])])->update(['password'=>md5($info['password'])]);
                if($res){
                    return view('admin/changepass',[
                        'navigation'=>$navigation,
                        'contenttitle_1'=>$contenttitle_1,
                        'contenttitle_2'=>$contenttitle_2,
                        'flag'=>'success',
                        'errors'=>['密码修改成功，请记住密码']
                    ]);
                }else{
                    return view('admin/changepass',[
                        'navigation'=>$navigation,
                        'contenttitle_1'=>$contenttitle_1,
                        'contenttitle_2'=>$contenttitle_2,
                        'flag'=>'danger',
                        'errors'=>['密码修改失败,如有问题联系管理员']
                    ]);
                }

            }else{
                return view('admin/changepass',[
                    'navigation'=>$navigation,
                    'contenttitle_1'=>$contenttitle_1,
                    'contenttitle_2'=>$contenttitle_2,
                    'flag'=>'danger',
                    'errors'=>['原始密码不正确']
                ]);
            }
        }else{
            $errors = $validator->errors()->all();
            return view('admin/changepass',[
                'navigation'=>$navigation,
                'contenttitle_1'=>$contenttitle_1,
                'contenttitle_2'=>$contenttitle_2,
                'flag'=>'danger',
                'errors'=>$errors
            ]);
        }
    }
}