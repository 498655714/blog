<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/17
 * Time: 22:14
 */
namespace App\Http\Controllers\Admin;
use App\Model\Tag;
use Illuminate\Http\Request;
use Validator;
use  Illuminate\Support\Facades\Input;
class TagController extends CommonController{
    //列出所有标签
    public function index(){
        $tags = new Tag;
        $tag = $tags->get()->toArray();
        return view('',['tags'=>$tag]);
    }

    //添加标签
    public function create(){
        $tags = new Tag;
    }

    //删除标签
    public function delete(){
        $tags = new Tag;
    }
}