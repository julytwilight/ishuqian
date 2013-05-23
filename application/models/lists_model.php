<?php

/**
 * 获得收藏夹列表
 */
class Lists_model extends CI_Model
{
	# 获得收藏夹列表
	public function getList($offset = 0, $limit = 10, $user_id = Null)
	{
		$query = $this->db->get_where('lists', array('user_id'=>$user_id));
		return $query->result_array();
	}

	public function addList($name)
	{
		$query = $this->db->limit(1)->get_where('lists', array(
			'user_id' => $this->session->userdata('userid'),
			'name' => $name,
		));

		if ( $query->row_array() )
			return array('status' => 200, 'data' => 'already exeist');

		$this->db->insert('lists', array(
			'user_id' => $this->session->userdata('userid'),
			'name' => $name,
			'bookmarks' => 0,
			'addtime' => time(),
		));

		return array('status' => 100, 'data' => $this->db->insert_id());
	}
	
	
	/**
	 * 获取分类的信息
	 */
	public function getCatInfo($userid)
	{
		$res = array();
		if(empty($userid) || !is_numeric($userid)){
			return array();
		}
    	$sql = "select * from i_lists where user_id ={$userid}";
    	$query = $this->db->query($sql);
    	if($query->num_rows() >0){
    		return $query->result_array();	
    	}else{
    		return array();
    	}		
	}		
}