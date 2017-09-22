<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/17
 * Time: 22:14
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Article;
use App\Model\Category;
use App\Model\Tag;
use Illuminate\Http\Request;
use Validator;
use  Illuminate\Support\Facades\Input;
class ArticleController extends CommonController{

    //全部文章 列表
    //路径 /admin/article
    // 路由名称article.index
    // 方法Get
    public function index(){
        $navigation = ['文章管理','文章列表页'];
        $contenttitle_1 = '文章管理';
        $contenttitle_2 = '列表';
        $article = new Article();
        $tag = new Tag();
        $tags = $tag->get()->toArray();
        $tags = $this->adjustArray($tags,'tag_id');
        $data = $article->orderBy('art_id','desc')->paginate(15);;
        return view('article.index',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'data'=>$data,
            'tags'=>$tags
        ]);
    }

    public function adjustArray($array,$array_val){
        $arr = array();
        foreach($array as $key => $val){
            $arr[$val[$array_val]] = $val;
        }
        return $arr;
    }
    //增加文章页面
    //路径 /admin/article/create
    // 路由名称article.create
    // 方法GET
    public function create(){
        $navigation = ['文章管理','文章添加页'];
        $contenttitle_1 = '文章管理';
        $contenttitle_2 = '添加';
        $category = new Category();
        $tag = new Tag();
        $tags = $tag->get()->toArray();
        $cates = $category->get();
        return view('article.create',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'cates'=>$cates,
            'tags'=>$tags,
        ]);
    }

    //增加文章操作
    //路径 /admin/article
    // 路由名称article.store
    // 方法POST
    public function store(){
        $navigation = ['文章管理','文章添加页'];
        $contenttitle_1 = '文章管理';
        $contenttitle_2 = '添加';
        $input = Input::except('_token');
        if(isset($input['tags'])){
            $input['art_tag'] = implode(',',$input['tags']);
            unset($input['tags']);
        }
        $rules = [
            'art_title'=>'required|size:100',
            'art_editor'=>'size:50',
            'art_description'=>'required|size:255',
            'art_content'=>'required|size:65535',
        ];
        $message = [
            'art_title.required'=>'文章名不能为空',
            'art_title.size'=>'文章名过长',
            'art_editor.size'=>'作者名过长',
            'art_description.required'=>'文章说明不能为空',
            'art_description.size'=>'文章说明过长',
            'art_content.required'=>'文章内容不能为空',
            'art_content.size'=>'文章内容过长',
        ];

        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $article = new Article();
            if(!isset($input['art_thumb'])){
                $input['art_thumb'] = "uploads/20170921142915100.jpg";
            }

            $rs = $article->create($input);
            if($rs){
                return redirect('/admin/article');
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
        $url = 'article.create';
        $category = new Category();
        $cates = $category->get();
        return view($url,[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'tags'=>$tags,
            'flag'=>$flag,
            'errors'=>$errors,
            'cates'=>$cates,
        ])->withInput(Input::all());
    }

    //全部文章列表
    //路径 /admin/article/{cate}
    // 路由名称article.show
    // 方法GET
    public function show(){

    }

    //文章编辑页面
    //路径  	/admin/article/{cate}/edit
    // 路由名称article.edit
    //方法GET
    public function edit($art_id){
        $navigation = ['文章管理','文章编辑页'];
        $contenttitle_1 = '文章管理';
        $contenttitle_2 = '编辑';
        $article = new Article();
        $category = new Category();
        $tag = new Tag();
        $tags = $tag->get()->toArray();
        $cates = $category->get();
        $data = $article->where('art_id',$art_id)->get()->toArray();
        if(!empty($data[0]['art_tag']))
        $data[0]['art_tag'] = explode(',',$data[0]['art_tag']);
        return view('article/edit',[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'tags'=>$tags,
            'data'=>$data,
            'cates'=>$cates
        ]);
    }

    //文章编辑操作
    //路径/admin/article/{cate}
    //路由名称article.update
    // 方法PUT/PATCH
    public function update($art_id){
        $navigation = ['文章管理','文章编辑页'];
        $contenttitle_1 = '文章管理';
        $contenttitle_2 = '编辑';
        $input = Input::except('_token','_method');
        $rules = [
            'art_title'=>'required|size:100',
            'art_editor'=>'size:50',
            'art_description'=>'required|size:255',
            'art_content'=>'required|size:65535',
        ];
        $message = [
            'art_title.required'=>'文章名不能为空',
            'art_title.size'=>'文章名过长',
            'art_editor.size'=>'作者名过长',
            'art_description.required'=>'文章说明不能为空',
            'art_description.size'=>'文章说明过长',
            'art_content.required'=>'文章内容不能为空',
            'art_content.size'=>'文章内容过长',
        ];

        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $article = new Article();
            if(isset($input['art_tag'])){
                $input['art_tag'] = implode(',',$input['art_tag']);
            }
            $rs = $article->where('art_id',$art_id)->update($input);
            if($rs){
                return redirect('/admin/article');
            }else{
                $errors = ['修改失败，稍后重试'];
                $flag  = 'danger';
            }
        }else{
            $flag  = 'danger';
            $errors = $validator->errors()->all();
        }
        $category = new Category();
        $tag = new Tag();
        $tags = $tag->get()->toArray();
        $cates = $category->get();
        $url = 'article.edit';
        $input['art_id'] = $art_id;
        return view($url,[
            'navigation'=>$navigation,
            'contenttitle_1'=>$contenttitle_1,
            'contenttitle_2'=>$contenttitle_2,
            'tags'=>$tags,
            'flag'=>$flag,
            'errors'=>$errors,
            'cates'=>$cates,
            'data'=>['0'=>$input],
        ]);
    }

    //文章删除
    //路径 /admin/article/{cate}
    // 路由名称article.destroy
    //方法DELETE
    public function destroy($art_id){
        $article = new Article();
        $res = $article->where('art_id',$art_id)->delete();
        if($res){
            $data = [
                'status'=>1,
                'message'=>'文章删除成功'
            ];
        }else{
            $data = [
                'status'=>2,
                'message'=>'文章删除失败，稍后重试'
            ];
        }
        return $data;
    }

    //ajax 异步文件上传处理
    public function imgtoup(){
        $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest';

        $result = array();

        $file = isset($_FILES['art_thump'])?$_FILES['art_thump']:$_FILES['undefined'];

        if(!preg_match('/^image\//' , $file['type'])
            || !preg_match('/\.(jpe?g|gif|png)$/' , $file['name'])
            || getimagesize($file['tmp_name']) === FALSE
        ) {
            $result['status'] = 'ERR';
            $result['message'] = '无效的图片格式!';
        }
        else if($file['size'] > 1048576) {
            $result['status'] = 'ERR';
            $result['message'] = '图片大小不能超过1mb!';
        }
        else if($file['error'] != 0 || !is_uploaded_file($file['tmp_name'])) {
            $result['status'] = 'ERR';
            $result['message'] = 'Unspecified error!';
        }
//        ! $this->resize($save_path, $thumb_path, 150)
        else {
            $save_path = explode('.',$file['name']);
            $save_path = date('YmdHis').rand(100,999).'.'.$save_path[1] ;
            //$thumb_path = 'thumb.jpg';
            if(
                ! move_uploaded_file($file['tmp_name'] , public_path().'/uploads/'.$save_path)

            )
            {
                $result['status'] = 'ERR';
                $result['message'] = '图片不能上传!';
            }

            else {
                $result['status'] = 'OK';
                $result['message'] = '图片上传成功!';
                $result['url'] = 'uploads/'.$save_path;
            }
        }


        $result = json_encode($result);
        if($ajax) {
            echo $result;
        }
        else {
            //for browsers that don't support uploading via ajax,
            //we have used an iframe instead and the response is sent as a script
            echo '<script language="javascript" type="text/javascript">';
            echo 'var iframe = window.top.window.jQuery("#' . $_POST['temporary-iframe-id'] . '").data("deferrer").resolve(' . $result . ');';
            echo '</script>';
        }

    }

    function resize($in_file, $out_file, $new_width, $new_height=FALSE)
    {
        $image = null;
        $extension = strtolower(preg_replace('/^.*\./', '', $in_file));
        switch($extension)
        {
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($in_file);
                break;
            case 'png':
                $image = imagecreatefrompng($in_file);
                break;
            case 'gif':
                $image = imagecreatefromgif($in_file);
                break;
        }
        if(!$image || !is_resource($image)) return false;


        $width = imagesx($image);
        $height = imagesy($image);
        if($new_height === FALSE)
        {
            $new_height = (int)(($height * $new_width) / $width);
        }


        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        $ret = imagejpeg($new_image, $out_file, 80);

        imagedestroy($new_image);
        imagedestroy($image);

        return $ret;
    }



}