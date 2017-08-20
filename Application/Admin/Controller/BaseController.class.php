<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller
{
    public function __construct() {
        parent::__construct();
        if (!session('?name')) {
            $this->redirect('/Admin/Login/Index','还没登录你干嘛');
        }
        // $url = $_SERVER['REQUEST_URI'];
        // $zhi = substr($url, 11);
        // //var_dump($zhi);
        // $num = strripos($zhi,'=');
        // $final = substr($zhi,0,$num);//针对带有参数的url
        // //var_dump($final);
        // $value = session('per');
        // //var_dump($value);die();
        // if(!in_array($zhi,$value)){
        //     if(!in_array($final,$value)) {
        //         $this->success('对不起您没有该权限',U('Admin/Index/main'),3);
        //         exit();
        //     }
        // }
    }

}