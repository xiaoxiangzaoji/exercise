<?php
/**
 * Created by PhpStorm.
 * User: choushan
 * Date: 17-6-23
 * Time: 下午4:06
 */
namespace Admin\Controller;
Class CustomerController extends \Admin\Controller\BaseController
{   
    public function __construct(){
        parent::__construct();
    }
    public function evaluate(){
        $url = $_SERVER['REQUEST_URI'];
        $zhi1 = substr($url, 11);
        $zhi2 = substr($zhi1,0,-5);
    	$value = session('per');
    	if(!in_array($zhi2,$value)){
            echo 222;
            $this->success('无权限','/Admin/Index/main',3);
        }  
    	//var_dump($value);die();
     //    $this->display();
    }
}