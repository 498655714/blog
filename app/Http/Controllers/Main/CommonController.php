<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class CommonController extends Controller
{

    //修改数组
    public function adjustArray($array,$array_val){
        $arr = array();
        foreach($array as $key => $val){
            $arr[$val[$array_val]] = $val;
        }
        return $arr;
    }
}
