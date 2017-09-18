<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/17
 * Time: 22:14
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends CommonController{

    //全部分类 列表
    //路径 /admin/category
    // 路由名称category.index
    // 方法Get
    public function index(Request $request){
        $navigation = ['文章分类管理','文章分类列表'];
        $contenttitle_1 = '文章分类';
        $contenttitle_2 = '数据列表';
        $category = new Category();
        $data = $category->orderBy('cate_order','asc')->get()->toAarry;//->paginate(20);
        $data = $this->make_tree($data,'cate_id','cate_pid',0);
        return view('category.index',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'data'=>$data
        ]);
    }
    public function make_tree1($list,$pk='id',$pid='pid',$child='_child',$root=0){
        $tree=array();
        foreach($list as $key=> $val){

            if($val[$pid]==$root){
                //获取当前$pid所有子类
                unset($list[$key]);
                if(! empty($list)){
                    $child=$this->make_tree1($list,$pk,$pid,$child,$val[$pk]);
                    if(!empty($child)){
                        $val['_child']=$child;
                    }
                }
                $tree[]=$val;
            }
        }
        return $tree;
    }

    public function make_tree($list,$id='id',$pid='pid',$root=0){
        $tree = array();
        foreach($list as $key=>$val){
            if($val[$pid] == $root){
                $tree[] = $list[$key];
                $this->make_tree1($list,$id,$pid,$id);
            }
        }
        return $tree;
    }
    public function vieworder(Request $request){
        $info = $request->all();
        $category = new Category();
        $res = $category->where(['cate_id'=>$info['cate_id']])->update(['cate_order'=>$info['cate_order']]);
        if($res){
            $data =[
                'status'=>1,
                'message'=>'文章分类排序修改成功！'
            ];
        }else{
            $data =[
                'status'=>2,
                'message'=>'文章分类排序修改失败！'
            ];
        }
        return $data;

    }
    //全部分类列表
    //路径 /admin/category/create
    // 路由名称category.create
    // 方法GET
    public function create(){

    }

    //全部分类列表
    //路径 /admin/category
    // 路由名称category.store
    // 方法POST
    public function store(){

    }

    //全部分类列表
    //路径 /admin/category/{cate}
    // 路由名称category.show
    // 方法GET
    public function show(){

    }

    //全部分类列表
    //路径  	/admin/category/{cate}/edit
    // 路由名称category.edit
    //方法GET
    public function edit(){


    }

    //全部分类列表
    //路径/admin/category/{cate}
    //路由名称category.update
    // 方法PUT/PATCH
    public function update(){

    }

    //全部分类列表
    //路径 /admin/category/{cate}
    // 路由名称category.destroy
    //方法DELETE
    public function destroy(){

    }

}