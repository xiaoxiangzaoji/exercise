<?php
namespace Admin\Controller;

Class IndexController extends \Admin\Controller\BaseController {
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->display();
    }
    public function left(){
        $this->display();
    }
    public function top(){
        $data['username'] =  $_SESSION['name'];
        $this->assign('name',$data['username']);

        $result = M('Admin')->where($data)->field('headimg')->find();
        // var_dump($result);die();
        $this->assign('result',$result['headimg']);
        $this->display();
    }
    public function main(){
        $this->display();
    }

}