<?php 
namespace Admin\Model;
use Think\Model;
class GoodLevelinfoModel extends Model {
	public function allCategory($field='*'){
		return $this->field($field)->select();
	}
	public function tree(&$list,$pid=0,$level=0,$html='--'){
		static $tree = array();
		foreach($list as $v){
			if($v['parent_id'] == $pid){
				$v['html'] = str_repeat($html,$level);
				$tree[] = $v;
				$this->tree($list,$v['id'],$level+1);
			}
		}
		return $tree;
	}
}
 ?>