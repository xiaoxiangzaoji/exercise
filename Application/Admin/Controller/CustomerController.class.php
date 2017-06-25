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
    public function __construct()
    {
        parent::__construct();
    }
    public function evaluate(){
        $this->display();
    }
}