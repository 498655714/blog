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
    //�г����б�ǩ
    public function index(){
        $tags = new Tag;
        $tag = $tags->get()->toArray();
        return view('',['tags'=>$tag]);
    }

    //��ӱ�ǩ
    public function create(){
        $tags = new Tag;
    }

    //ɾ����ǩ
    public function delete(){
        $tags = new Tag;
    }
}