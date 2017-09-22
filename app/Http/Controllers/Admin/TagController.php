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
        return view('tag/index',['tags'=>$tag]);
    }

    //添加标签
    public function edit(){
        $input = Input::except('_token');
        $tags = new Tag;
        if(!empty($input['tag_name'])){
            if(isset($input['tag_id']) && !empty($input['tag_id'])){
                $rs = $tags->where('tag_id',$input['tag_id'])->update($input);
            }else{
                $rs = $tags->create($input);
            }
            if($rs){
                $data = [
                    'status'=>1,
                    'message'=>'操作成功！'
                ];
            }else{
                $data = [
                    'status'=>2,
                    'message'=>'操作失败！'
                ];
            }
        }else{
            $data = [
                'status'=>3,
                'message'=>'数据不能为空！'
            ];
        }
        $tag = $tags->get()->toArray();
        return view('tag/index',['data'=>$data,'tags'=>$tag]);
    }

}