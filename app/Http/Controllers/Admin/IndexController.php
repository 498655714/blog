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
        $servername = $_SERVER['SERVER_NAME'];//服务器主机的名称。
        $host = $_SERVER['HTTP_HOST'] ;
        $host = $_SERVER['REMOTE_HOST']  ;
        $server = $_SERVER['SERVER_SIGNATURE']  ;
        var_dump($_SESSION);exit();
        return view('admin/index',
            [   'navigation'=>$navigation,
                'contenttitle_1'=>$contenttitle_1,
                'contenttitle_2'=>$contenttitle_2
            ]);
    }
}