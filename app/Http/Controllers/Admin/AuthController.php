<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
require_once 'resourse/org/ValidateCode.class.php';  //�Ȱ������������ʵ��·������ʵ����������޸ġ�
class AuthController extends CommonController
{
    //��¼����
    public function  getLogin(){
        return view('admin/login');
    }
    //��¼����
    public function postLogin(){

    }
    //�˳���¼
    public function getLogout(){

    }
    //ע�����
    public function getRegister(){

    }
    //ע�����
    public function postRegister(){

    }

    //������֤��
    public function code(){
        $_vc = new \ValidateCode();      //ʵ����һ������
        $_vc->doimg();
        $_SESSION['code'] = $_vc->getCode();//��֤�뱣�浽SESSION��
    }

    //У����֤��
    public function checkCode(){
        $_SESSION['code'];
    }
}
