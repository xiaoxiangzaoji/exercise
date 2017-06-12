<?php 
namespace Admin\Controller;
use Admin\Controller\BaseController;
Class SystemController extends BaseController{
	public function __construct(){
		parent::__construct();
	}
	public function permission_list(){
		$P = isset($_GET['p'])?$_GET['p']:1;
		$list = M('Permission_list')->page($P.',10')->select();

		$count = M('Permission_list')->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数

		$Page->lastSuffix = false;//最后一页不显示为总页数
        $Page->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$page_show = bootstrap_page_style($Page->show());//重点在这里
		$this->assign('page_show',$page_show);

		$this->assign('list',$list);
		$this->display();
	}
	public function add_perssion(){
		$data['permissions'] = I('post.permission')!='' ? I('post.permission') : false;
		$data['per_name'] = I('post.pername')!='' ? I('post.pername') : false;
        if(!$data['permissions']||!$data['per_name']){
            echo 1;
            exit();
        }
		$result = M('Permission_list')->add($data);
		if ($result) {
			echo 2;
		}else{
			echo 1;
		}
	}
	public function del_perssion(){
		$data['id'] = I('get.id');
		$result = M('Permission_list')->where($data)->delete();
		if ($result) {
			echo 2;
		}else{
			echo 1;
		}	
	}
	public function role_list(){
		$list = M('Role')->where('sign = 1')->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function add_role(){
		$data['role_name'] = I('post.permission')!='' ? I('post.permission') : false;
        if(!$data['role_name']){
            echo 1;
            exit();
        }
		$result = M('Role')->add($data);
		if ($result) {
			echo 2;
		}else{
			echo 1;
		}
	}
	public function del_role(){
		$data['id'] = I('get.id');
		$result = M('Role')->where($data)->delete();
		$datas['role_id'] = I('get.id');
		$result2 = M('Role_permission')->where($datas)->delete();
		if ($result && $result2) {
			echo 2;
		}else{
			echo 1;
		}	
	}
	public function admin_member(){
		$list = M('Admin')->join('LEFT JOIN __ROLE__ ON __ADMIN__.role_id = __ROLE__.id')->field('`cs_admin`.*,`cs_role`.id as rid,role_name')->select();
		 //var_dump($list);die();
		$this->assign('list',$list);
		$result = M('Role')->select();
		$this->assign('result',$result);
		$this->display();
	}
	public function del_admin(){
		$data['id'] = I('get.id');
		$result = M('Admin')->where($data)->delete();
		if ($result) {
			echo 2;
		}else{
			echo 1;
		}
	}
	public function add_admin(){
		$data['username'] = I('post.permission')!='' ? I('post.permission') : false;
		$data['password'] = I('post.pername')!='' ? md5(I('post.pername')) : false;
		$data['role_id'] = I('post.levels')!='' ?I('post.levels') : false;
		$data['headimg'] = 'Public/Admin/image/default_user_portrait.gif';
        if(!$data['username']||!$data['password']||!$data['role_id']){
            echo 1;
            exit();
        }
		$result = M('Admin')->add($data);
		if ($result) {
			echo 2;
		}else{
			echo 1;
		}
	}
	//分配权限
	public function distribute(){
		$list = M('Permission_list')->field('id,per_name')->select();
		$this->assign('list',$list);
		$roleid = I('get.id');
		$result = M('Role_permission')->join('LEFT JOIN __PERMISSION_LIST__ ON __ROLE_PERMISSION__.permission = __PERMISSION_LIST__.id')->where("role_id = $roleid")->field('role_id,per_name,`cs_permission_list`.id as pid')->select();
		$role = M('Role')->field('role_name')->getById("$roleid");
		$this->assign('role_id',$roleid);
		$this->assign('role',$role);
		$this->assign('result',$result);
		$this->display();
	}
	//增加后台权限
	public function add_admin_permission(){
		$id['role_id'] = I('post.str1');
		$data = explode(',',I('post.str'));
		for ($i=0; $i < count($data) ; $i++) { 
			$datalist["$i"] = array('role_id'=>"{$id['role_id']}",'permission'=>"{$data[$i]}");
			$result = M('Role_permission')->where($datalist)->count();
			// echo $result;die();
			if ($result >= 1) {
				unset($datalist["$i"]);
				exit();
			}
		}
		$list = M('Role_permission')->addAll($datalist);
		if ($list) {
			echo true;
		}else{
			echo false;
		}
	}
	//删除角色某一个权限
	public function del_role_permission(){
		$data['permission'] = I('post.permission')!='' ? I('post.permission') : false;
		$data['role_id'] = I('post.role_id')!='' ? I('post.role_id') : false;
		$result = M('Role_permission')->where("role_id = {$data['role_id']} and permission = {$data['permission']}")->delete();
		if ($result) {
			echo 2;
		}else{
			echo 1;
		}
	}
}







 ?>