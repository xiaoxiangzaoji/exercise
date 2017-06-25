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
    }

}