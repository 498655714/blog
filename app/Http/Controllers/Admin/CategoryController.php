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
use Validator;
use  Illuminate\Support\Facades\Input;
class CategoryController extends CommonController{

    //全部分类 列表
    //路径 /admin/category
    // 路由名称category.index
    // 方法Get
    public function index(Request $request){
        $navigation = ['分类管理','分类列表页'];
        $contenttitle_1 = '分类管理';
        $contenttitle_2 = '列表';
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
    //递归根据pid2进行排序
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
    //增加分类页面
    //路径 /admin/category/create
    // 路由名称category.create
    // 方法GET
    public function create(){
        $navigation = ['分类管理','分类添加页'];
        $contenttitle_1 = '分类管理';
        $contenttitle_2 = '添加';
        $category = new Category();
        $cates = $category->get();
        return view('category.create',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'cates'=>$cates,
        ]);
    }

    //增加分类操作
    //路径 /admin/category
    // 路由名称category.store
    // 方法POST
    public function store(){
        $navigation = ['分类管理','分类添加页'];
        $contenttitle_1 = '分类管理';
        $contenttitle_2 = '添加';
        $input = Input::except('_token');
        $rules = [
            'cate_name'=>'required',
            'cate_title'=>'required',
            'cate_order'=>'required',
        ];
        $message = [
            'cate_name.required'=>'分类名不能为空',
            'cate_title.required'=>'分类说明不能为空',
            'cate_order.required'=>'排序不能为空',
        ];

        $category = new Category();
        $cates = $category->get();
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $rs = Category::create($input);
            if($rs){
                return redirect('/admin/category');
            }else{
                $errors = ['添加失败，稍后重试'];
                $flag  = 'danger';
            }
        }else{
            $flag  = 'danger';
            $errors = $validator->errors()->all();
        }
        $url = 'category.create';
        return view($url,[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'flag'=>$flag,
            'errors'=>$errors,
            'cates'=>$cates,
        ]);
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
    public function edit($cate_id){
        $navigation = ['分类管理','分类编辑页'];
        $contenttitle_1 = '分类管理';
        $contenttitle_2 = '编辑';
        $category = new Category();
        $cates = $category->get();
        $data = $category->where('cate_id',$cate_id)->get();
        return view('category/edit',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'data'=>$data,
            'cates'=>$cates
        ]);
    }

    //分类编辑操作
    //路径/admin/category/{cate}
    //路由名称category.update
    // 方法PUT/PATCH
    public function update($cate_id){
        $navigation = ['分类管理','分类编辑页'];
        $contenttitle_1 = '分类管理';
        $contenttitle_2 = '编辑';
        $input = Input::except('_token','_method');
        $rules = [
            'cate_name'=>'required',
            'cate_title'=>'required',
            'cate_order'=>'required',
        ];
        $message = [
            'cate_name.required'=>'分类名不能为空',
            'cate_title.required'=>'分类说明不能为空',
            'cate_order.required'=>'排序不能为空',
        ];

        $category = new Category();
        $cates = $category->get();
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $rs = Category::where('cate_id',$cate_id)->update($input);
            if($rs){
                return redirect('/admin/category');
            }else{
                $errors = ['修改失败，稍后重试'];
                $flag  = 'danger';
            }
        }else{
            $flag  = 'danger';
            $errors = $validator->errors()->all();
        }
        $url = 'category.edit';
        $input['cate_id'] = $cate_id;
        return view($url,[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'flag'=>$flag,
            'errors'=>$errors,
            'cates'=>$cates,
            'data'=>['0'=>$input],
        ]);
    }

    //分类删除
    //路径 /admin/category/{cate}
    // 路由名称category.destroy
    //方法DELETE
    public function destroy($cate_id){
        $category = new Category();
        $res = $category->where('cate_id',$cate_id)->delete();
        $category->where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
        if($res){
            $data = [
                'status'=>1,
                'message'=>'分类删除成功'
            ];
        }else{
            $data = [
                'status'=>2,
                'message'=>'分类删除失败，稍后重试'
            ];
        }
        return $data;
    }

}