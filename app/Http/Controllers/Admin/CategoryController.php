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
        $info = $request->all();
        $navigation = ['文章分类管理','文章分类列表'];
        $contenttitle_1 = '文章分类';
        $contenttitle_2 = '数据列表';
        $category = new Category();
        $data = $category->paginate($info->num?$info->num:1);
        return view('category.index',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'data'=>$data
        ]);
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