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
        $data = $category->orderBy('cate_order','asc')->get();//->paginate(20);
        $data = $this->make_tree($data,'cate_id','cate_pid',0);
        return view('category.index',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'data'=>$data
        ]);
    }
    public function make_tree($list,$id='id',$pid='pid',$root=0,$levels=0){
        $tree = array();
        foreach($list as $key=>$val){
            if($val[$pid] == $root){
                $list[$key]['_cate_name'] = $list[$key]['cate_name'];
                $list[$key]['levels'] = $levels;
                $tree[] = $list[$key];
                unset($list[$key]);
                if(! empty($list)){
                    $child=$this->make_tree($list,$id,$pid,$val[$id],$levels+1);
                    if(!empty($child)){
                        foreach($child as $value){
                            $str = '';
                            for($i=0;$i<$value['levels'];$i++){
                                $str .= '　';
                            }
                            $value['_cate_name'] = $str.'├─ '.$value['cate_name'];
                            $tree[] = $value;
                        }
                    }
                }
            }
        }
        return $tree;
    }
    //ajax异步请求修改分类排序
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
    //增加编辑分类页面
    //路径 /admin/category/create
    // 路由名称category.create
    // 方法GET
    public function create(){

    }

    //增加编辑分类操作
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

    //分类编辑页面
    //路径  	/admin/category/{cate}/edit
    // 路由名称category.edit
    //方法GET
    public function edit(Request $request){
        $info = $request->all();
        $navigation = ['文章分类管理','文章分类列表'];
        $contenttitle_1 = '文章分类';
        $contenttitle_2 = '数据列表';
        $category = new Category();
        $data = $category->where('cate_id',$info['cate_id'])->get();
        return view('category/edit',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'data'=>$data
        ]);
    }

    //分类编辑操作
    //路径/admin/category/{cate}
    //路由名称category.update
    // 方法PUT/PATCH
    public function update(){
        echo '分类编辑操作';
    }

    //分类删除
    //路径 /admin/category/{cate}
    // 路由名称category.destroy
    //方法DELETE
    public function destroy(){

    }

}