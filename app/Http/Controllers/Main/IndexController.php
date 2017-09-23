<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/17
 * Time: 0:56
 */
namespace App\Http\Controllers\Main;
use \App\Http\Controllers\Main\CommonController;
use Validator;
use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Category;
use App\Model\Tag;
use  Illuminate\Support\Facades\Input;
class IndexController extends CommonController{

    //取得公共部分需要的信息
    public function getinfo(){
        $arr = array();//存贮公共信息
        //取得所有标签
        $tags = Tag::get()->toArray();
        $tag_array = $this->adjustArray($tags,'tag_id');
        $hot_art = Article::orderBy('art_view','desc')->limit(5)->get(['art_id','art_title','art_description','art_thumb','art_view'])->toArray();
        foreach($hot_art as $key=>$val){
            $hot_art[$key]['art_title'] = $this->cut_str($val['art_title'],14);
            $hot_art[$key]['art_description'] = $this->cut_str($val['art_description'],28);
        }
        $arr['tags'] = $tag_array;
        $arr['hot_art'] = $hot_art;

        return $arr;
    }
    //博客首页
    public function getindex(){
        $article = new Article();
        $info = $this->getinfo();
        $tag_array = $info['tags'];
        $hot_art = $info['hot_art'];
        $arr = array();
        $articles = $article->orderBy('art_id','desc')->limit(5)->get()->toArray();
        foreach($articles as $key=>$val){
            if(!empty($val['art_tag'])){
                $cun_tags = explode(',',$val['art_tag']);
                foreach($cun_tags as $cun_key=>$cun_val){
                    $arr[$cun_key] = $tag_array[$cun_val];
                }
                $articles[$key]['art_tag'] = $arr;
                unset($arr);
            }

        }
        return view('main.index',['articles'=>$articles,'tags'=>$tag_array,'hot_art'=>$hot_art]);
    }

    //博客内容页
    public function getdetail($art_id){
        $article = new Article();
        $info = $this->getinfo();
        $tag_array = $info['tags'];
        $hot_art = $info['hot_art'];
        $articles = $article->where('art_id',$art_id)->get()->toArray();
        $cate_name = Category::where('cate_id',$articles[0]['cate_id'])->get(['cate_id','cate_name'])->toArray();
        $articles[0]['cate_name'] = $cate_name[0]['cate_name'];
        return view('main.detail',['articles'=>$articles[0],'tags'=>$tag_array,'hot_art'=>$hot_art]);
    }


}