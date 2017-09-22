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
use App\Model\Tag;
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
        $tag = new Tag();
        $tags = $tag->get()->toArray();
        $data = $category->orderBy('cate_order','asc')->get()->toArray();//->paginate(20);
        $data = $this->make_tree($data,'cate_id','cate_pid',0);
        return view('category.index',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'data'=>$data,
            'tags'=>$tags
        ]);
    }
    //ajax异步请求修改分类排序
    public function vieworder(Request $request){
        $info = $request->all();
        if(!is_numeric($info['cate_order'] ) || !is_int($info['cate_order'] || $info['cate_order'] < 0 || $info['cate_order'] >255)){
            return $data =[
                'status'=>3,
                'message'=>'文章分类排序必须是0-255数字整数！'
            ];
        }
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
        $tag = new Tag();
        $tags = $tag->get()->toArray();
        $cates = $category->get()->toArray();
        $cates = $this->make_tree($cates,'cate_id','cate_pid',0);
        return view('category.create',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'cates'=>$cates,
            'tags'=>$tags,
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
            'cate_name'=>'required|max:50',
            'cate_title'=>'required|max:255',
            'cate_description'=>'max:255',
            'cate_order'=>'required|integer|between:0,255',
        ];
        $message = [
            'cate_name.required'=>'分类名不能为空',
            'cate_name.max'=>'分类名过长',
            'cate_title.required'=>'分类说明不能为空',
            'cate_description.max'=>'分类描述过长',
            'cate_order.required'=>'排序不能为空',
            'cate_order.integer'=>'排序必须是整数',
            'cate_order.between'=>'排序必须在0-255之间的整数',
        ];

        $category = new Category();
        $cates = $category->get()->toArray();
        $cates = $this->make_tree($cates,'cate_id','cate_pid',0);
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            if(isset($input['tags'])){
                $input['cate_keywords'] = implode(',',$input['tags']);
                unset($input['tags']);
            }
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
        $tag = new Tag();
        $tags = $tag->get()->toArray();
        $url = 'category.create';
        return view($url,[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'flag'=>$flag,
            'errors'=>$errors,
            'cates'=>$cates,
            'tags'=>$tags,
        ])->withInput(Input::all());
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
        $tag = new Tag();
        $tags = $tag->get()->toArray();
        $cates = $category->get()->toArray();
        $cates = $this->make_tree($cates,'cate_id','cate_pid',0);
        $data = $category->where('cate_id',$cate_id)->get()->toArray();
        if(!empty($data[0]['cate_keywords']))
            $data[0]['cate_keywords'] = explode(',',$data[0]['cate_keywords']);
        return view('category/edit',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'data'=>$data,
            'cates'=>$cates,
            'tags'=>$tags
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
            'cate_name'=>'required|max:50',
            'cate_title'=>'required|max:255',
            'cate_description'=>'max:255',
            'cate_order'=>'required|integer|between:0,255',
        ];
        $message = [
            'cate_name.required'=>'分类名不能为空',
            'cate_name.max'=>'分类名过长',
            'cate_title.required'=>'分类说明不能为空',
            'cate_description.max'=>'分类描述过长',
            'cate_order.required'=>'排序不能为空',
            'cate_order.integer'=>'排序必须是整数',
            'cate_order.between'=>'排序必须在0-255之间的整数',
        ];

        $category = new Category();
        $cates = $category->get()->toArray();
        $cates = $this->make_tree($cates,'cate_id','cate_pid',0);
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            if(isset($input['cate_keywords'])){
                $input['cate_keywords'] = implode(',',$input['cate_keywords']);
            }
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
        $tag = new Tag();
        $tags = $tag->get()->toArray();
        $url = 'category.edit';
        $input['cate_id'] = $cate_id;
        return view($url,[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'flag'=>$flag,
            'errors'=>$errors,
            'cates'=>$cates,
            'tags'=>$tags,
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