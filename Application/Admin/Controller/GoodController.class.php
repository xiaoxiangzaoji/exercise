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
			//var_dump($_POST);
			$data['goodname']= $_POST['goodname']?$_POST['goodname']:false;
			$data['level']= $_POST['level']?$_POST['level']:false;
			$data['ison']= $_POST['ison']?$_POST['ison']:false;
			$data['price']= $_POST['price']?$_POST['price']:false;
			$data['goodsinfo']= $_POST['goodsinfo']?$_POST['goodsinfo']:false;
			//echo "<pre>";print_r($_FILES);echo "<pre>";
			//die();

			$upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->autoSub =  true; //自动子目录保存文件
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =  './Uploads/goods/'; // 设置附件上传根目录
            //$upload->savePath = 'goods';// 设置附件上传目录
            //$upload->saveName = time().'_'.mt_rand();
            $upload->replace = true; //存在同名是否覆盖
            //var_dump($_FILES);
            $info = $upload->upload();
            if(!$info) {// 上传错误提示错误信息
		        $this->error($upload->getError());
		    }else{// 上传成功
		    	//var_dump($info[0]);var_dump($info[1]);var_dump($info[2]);
		    	$pho[] = $info[0]['savepath'].$info[0]['savename'];
		    	$pho[] = $info[1]['savepath'].$info[1]['savename'];
		    	$pho[] = $info[2]['savepath'].$info[2]['savename'];
		    	$data['savepath'] = implode("|",$pho);
		    	// var_dump($data['savepath']);
		    	// die();
		    	$goods = M('goodinfo');
		    	$result = $goods->add($data);
		        $this->success('上传成功！');
		    }
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
    public function add_goodsphoto(){
    	var_dump($_file);die();
    	
	}
	public function goodslist(){
		if (IS_POST) {
			if (isset($_POST['pro_id'])) {
	        	$data['provinceid'] = $_POST['pro_id'];
	        	$city = M('cities')->where($data)->select();
	        	$opt = '<option>--请选择市区--</option>';
				foreach($city as $key=>$val){
				    $opt .= "<option value='{$val['cityid']}'>{$val['city']}</option>";
				}
				echo json_encode($opt);
			}else{
				if (isset($_POST['city_id'])) {
		        	$data['cityid'] = $_POST['city_id'];
		        	$area = M('areas')->where($data)->select();
		        	$opt = '<option>--请选择区--</option>';
					foreach($area as $key=>$val){
					    $opt .= "<option value='{$val['areaid']}'>{$val['area']}</option>";
					}
					echo json_encode($opt);
				}
			}
    	} else {
	        $region = M('provinces')->select();
	        $this->assign('region',$region);
	        $this->display();
	    }
	}
	public function huishou(){
		$company = M('company');
		$result = $company->select();
		$this->assign('result',$result);
		$this->display();
	}
	public function jinweidu(){
		if (!empty($_GET['add'])) {
			echo 2;
		}else{
			echo 1;
		}
	}
}












 ?>