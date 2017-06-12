<?php 
namespace Admin\Controller;
Class GoodController extends \Admin\Controller\BaseController{
	public function __construct(){
		parent::__construct();
	}
	public function good_level(){
		// $list = M('Good_levelinfo')->select();
		// $this->assign('list',$list);
		// $this->display();
		$cat = D('Good_levelinfo');
		//var_dump($cat);die();
		$field = array('id','level_name','parent_id');
		$row = $cat->allCategory($field );
		//var_dump($row);die();
		//生成无限极分类
		$list=$cat->tree($row);
		//var_dump($list);die();

		$this->assign('row',$list);
		$this->display();

	}
}












 ?>