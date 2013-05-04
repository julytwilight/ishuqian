<?php

/**
 * Sns Model
 * @author Seven
 */
class Sns_model extends CI_Model
{
	public function create($token)
	{
		$this->db->insert('sns', array(
			'user_id' => $this->session->userdata('userid'),
			'type' => 'weibo',
			'identity' => $token['uid'],
			'expire' => $token['expires_in'],
			'access_token' => $token['access_token'],
			'addtime' => time(),
		));	
	}

	public function is_exist($identity)
	{
		$query = $this->db->limit(1)->get_where('sns', array('identity'=>$identity));
		return $query->row_array();
	}
}