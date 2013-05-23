<?php

/**
 * 
 */
class Bookmarks_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	# 获得书签列表
	public function getList($offset = 0, $limit = 10, $user_id = Null, $list_id = Null, $is_private = 1)
	{
		$unclass = array();
		$this->db->select('bookmarks.id as bid,bookmarks.*,lists.*');
		$this->db->from('bookmarks');
		$this->db->join('lists', 'bookmarks.list_id = lists.id');
		if ( $user_id )
			$this->db->where('bookmarks.user_id', $user_id);
		if ( $list_id )
			$this->db->where('bookmarks.list_id', $list_id);
		if ( !$is_private )
			$this->db->where('bookmarks.is_private', $is_private);
		$this->db->limit($limit, $offset);
		$this->db->order_by('bookmarks.addtime', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	# 添加一个书签
	public function create()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'url' => $this->input->post('url'),
			'list_id' => $this->input->post('list') ? $this->input->post('list') : 0,
			'is_private' => $this->input->post('is_private') ? 1 : 0,
			'comment' => $this->input->post('comment'),
			'addtime' => time(),
			'user_id' => $this->session->userdata('userid'),
			'views' => 0,
			'answers' => 0,
			'score' => 0,
		);

		$this->db->insert('bookmarks', $data);
		return $this->db->affected_rows(); //add by mark 2013-05-23 13:09:21
	}
	
	/**
	 * 获取书签的信息
	 */
	public function getBookmarks($id)
	{
		$res = array();
		if(empty($id) || !is_numeric($id)){
			return array();
		}
    	$sql = "select * from i_bookmarks where id ={$id}";
    	$query = $this->db->query($sql);
    	if($query->num_rows() >0){
    		return $query->result_array();	
    	}else{
    		return array();
    	}		
	}	
	
}