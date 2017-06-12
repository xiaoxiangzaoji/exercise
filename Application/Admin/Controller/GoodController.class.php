<?php 
namespace Admin\Controller;
Class GoodController extends \Admin\Controller\BaseController{
	public function __construct(){
		parent::__construct();
	}
	public function good_level(){
		$P = isset($_GET['p'])?$_GET['p']:1;
		$cat = D('Good_levelinfo');
		$field = array('id','level_name','parent_id','status');
		$result = $cat->allCategory($field );
		$list=$cat->tree($result);
		$this->assign('result',$list);
		$row = $cat->page($P.',3')->allCategory($field );//分页
		$count = M('Good_levelinfo')->where('status = 1')->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数

		$Page->lastSuffix = false;//最后一页不显示为总页数
        $Page->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$page_show = bootstrap_page_style($Page->show());//重点在这里
		$this->assign('page_show',$page_show);
		$this->assign('row',$row);
		$this->display();
	}
}












 ?>