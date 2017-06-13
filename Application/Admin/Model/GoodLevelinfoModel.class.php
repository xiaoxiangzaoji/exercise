<?php 
namespace Admin\Model;
use Think\Model;
//��Ʒ����
class GoodLevelinfoModel extends Model {
	public function allCategory($field='*'){
		return $this->field($field)->select();
	}
	//���߷���
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
	//���ݸ���ɾ������
	public function drop_nodes( $nid ) {
        $childs = $this->where( array( 'parent_id' => $nid ) )->select();
        $result = $this->where("id = %d", $nid)->delete();
        if ( is_array($childs) && !empty($childs) ) {
              foreach ($childs as $key => $child) {
                $this->drop_nodes( $child['id'] );
            }
        }
        return $result;
    }
}
 ?>