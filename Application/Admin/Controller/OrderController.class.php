<?php
/**
 * Created by PhpStorm.
 * User: choushan
 * Date: 17-7-15
 * Time: 上午11:53
 */
namespace Admin\Controller;
class OrderController extends \Admin\Controller\BaseController{
    public function __construct()
    {
        parent::__construct();
    }
    public function orderinfo(){
        $this->display();
    }
}