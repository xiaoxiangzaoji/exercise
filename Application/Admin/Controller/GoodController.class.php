<?php 
namespace Admin\Controller;
Class GoodController extends \Admin\Controller\BaseController{
	public function __construct(){
		parent::__construct();
	}
	//商品分类列表
	public function good_level(){
		$P = isset($_GET['p'])?$_GET['p']:1;
		$cat = D('Good_levelinfo');
		$field = array('id','level_name','parent_id','status');
		$result = $cat->allCategory($field );
		//无线分类
		$list=$cat->tree($result);
		$this->assign('result',$list);
		$row = $cat->page($P.',5')->field($field )->select();//分页
		$count = M('Good_levelinfo')->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数

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
	//商品分类增加
	public function add_goodlevel(){
		$data['level_name'] = I('post.levelname')?I('post.levelname'):false;
		$data['parent_id'] = I('post.parent_id')?I('post.parent_id'):false;
		$list = M('Good_levelinfo')->add($data);
		if ($list) {
			echo 22;
		}else{
			echo 11;
		}
	}
	public function del_goodlevel(){
		$id = I('get.id');
		$good = D('Good_levelinfo');
		$list = $good->drop_nodes($id);
		if ($list) {
			echo 2;
		}else{
			echo 1;
		}
	}
	public function update_level(){
		$data['level_name'] = I('post.level_name');
		$data['status'] = I('post.status');
		$id= I('post.id');
		$list = M('Good_levelinfo')->where("id =$id")->save($data);
		if ($list) {
			echo 2;
		}else{
			echo 1;
		}
	}
	//添加商品页面
	public function add_goods(){
		if (IS_POST) {
			var_dump($_post);
		}else{
	        $cat = D('Good_levelinfo');
	        $field = array('id','level_name','parent_id','status');
	        $result = $cat->allCategory($field );
	        //无线分类
	        $list=$cat->tree($result);
	        $this->assign('result',$list);
		    $this->display();	    			
		}
    }
}












 ?>