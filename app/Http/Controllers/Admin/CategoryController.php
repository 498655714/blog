<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/17
 * Time: 22:14
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CommonController;
class CategoryController extends CommonController{

    //全部分类 列表
    //路径 /admin/category
    // 路由名称category.index
    // 方法Get
    public function index(){
        return view('category.index');
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