<?php

/**
 * 扩展类 
 */
class MY_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if ( !$this->session->userdata('userid') && isset($_COOKIE['ishuqian_user_id']) && isset($_COOKIE['ishuqian_cookie_auth']) ) {

			$data = array(
				'id' => $_COOKIE['ishuqian_user_id'],
				'cookie_auth' => $_COOKIE['ishuqian_cookie_auth'],
			);

			$query = $this->db->limit(1)->get_where('users', $data);
			if ( $data = $query->row_array() ) {
				$this->session->set_userdata(array(
					'userid' => $data['id'],
					'email' => $data['email'],
					'username' => $data['username'],
				));
			}
		}
	}

	public function display($uri, $data = array())
	{
		//$this->load->view('layout/header', $data); //modify by mark 有的页面不需要加载头部 在view文件直接包含
		$this->load->view($uri,$data);
	}
}