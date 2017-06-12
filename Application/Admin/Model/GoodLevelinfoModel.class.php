<?php 
namespace Admin\Model;
use Think\Model;
//无线分类
class GoodLevelinfoModel extends Model {
	public function allCategory($field='*'){
		return $this->field($field)->select();
	}
	public function tree($data,$pid=0,$level=1){
	    static $treeArr = array();
	    foreach ($data as $v)
	    {
	        if ($v['parent_id'] == $pid)
	        {
	            $v['level'] = $level;
	            $treeArr[] = $v;
	            $this->tree($data, $v['id'], $level + 1);
	        }
	    }
	    return $treeArr;
	}
}
 ?>