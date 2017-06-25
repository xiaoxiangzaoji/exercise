<?php 
namespace Admin\Controller;

Class MemberController extends \Admin\Controller\BaseController{
    public function __construct()
    {
        parent::__construct();
    }

    public function mermber_info(){
		if (IS_AJAX) {
			echo 222;
		}else{
		$P = isset($_GET['p'])?$_GET['p']:1;
		$merber = M('merber'); // 实例化User对象
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$list = $merber->page($P.',3')->join('LEFT JOIN __LEVEL__ ON __MERBER__.level = __LEVEL__.id')->field('`cs_merber`.id,merber_name,login_number,last_login_ip,balance,is_login,sort')->select();
		//var_dump($list);die();
		$this->assign('list',$list);// 赋值数据集
		$count = $merber->where('is_login=0')->count();// 查询满足要求的总记录数
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

		$this->display(); // 输出模板
		}
	}
	//级别列表
	public function level_list(){
		$merber = M('Level');
		$result = $merber->select();
		$this->assign('result',$result);
		$this->display();
	}
	//删除某一级别
	public function del_level(){
		$data['id'] = I('get.id');
		$result = M('Level')->where($data)->delete();
		if ($result) {
			echo 2;
		}else{
			echo 1;
		}	
	}
	//增加某一级别
	public function add_level(){
		$data['sort'] = I('post.level')!='' ? I('post.level') : false;
		$data['need_money'] = I('post.money')!='' ? I('post.money') : false;
        if(!$data['sort']||!$data['need_money']){
            echo 1;
            exit();
        }
		$result = M('Level')->add($data);
		if ($result) {
			echo 2;
		}else{
			echo 1;
		}
	}
	//删除所有的
	public function del_all(){

	}
}













 ?>