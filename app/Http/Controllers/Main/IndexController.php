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
class IndexController extends CommonController{
    //博客首页
    public function getindex(){
        $tags = Tag::get()->toArray();
        $tag_array = $this->adjustArray($tags,'tag_id');
        return view('main.index',['tags'=>$tag_array]);
    }

    //博客首页内容区
    public function gethome(){
        $article = new Article();
        $tags = Tag::get()->toArray();
        $tag_array = $this->adjustArray($tags,'tag_id');
        $articles = $article->orderBy('art_id','desc')->limit(5)->get()->toArray();
        foreach($articles as $key=>$val){
            if(!empty($val['art_tag'])){
                $cun_tags = explode(',',$val['art_tag']);
                foreach($cun_tags as $cun_key=>$cun_val){
                    $arr[] = $tag_array[$cun_val];
                }
                $articles[$key]['art_tag'] = $arr;
            }
        }
        return view('main.home',['articles'=>$articles]);
    }

}