<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CommonController extends Controller
{

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
}
