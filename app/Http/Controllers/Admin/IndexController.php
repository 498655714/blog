<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/17
 * Time: 0:56
 */
namespace App\Http\Controllers\Admin;
use \App\Http\Controllers\Admin\CommonController;

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

    //更改密码
    public function changepass(){
        return view('admin.changepass');
    }
}