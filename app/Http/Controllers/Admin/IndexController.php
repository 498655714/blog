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
        return view('admin/index');
    }
}