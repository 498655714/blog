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

    public function getindex(){
        $article = new Article();
        $articles = $article->limit(5)->get()->toArray();
        dd($articles);
        return view('main.index');
    }
}