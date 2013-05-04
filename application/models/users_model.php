<?php

/**
 * Users Model
 * @author Seven
 */
class Users_model extends CI_Model
{
	public function __construct()
	{
		$this->load->helper('user');
	}

	# 创建用户
	public function register()
	{
		$data = array(
			'email'    => $this->input->post('email'),
			'password' => encryp_pass( $this->input->post('password') ),
			'addtime'  => time(),
		);

		if ( !$this->db->insert('users', $data) )
			die('用户注册失败');
		
		$this->session->set_userdata(array(
			'userid' => $this->db->insert_id(),
			'email' => $this->input->post('email'),
			'username' =>'',
		));
		$cookie_auth = encryp_pass(time());
		set_cookie( $this->session->userdata('userid'), $cookie_auth);

		# 更新数据库用户的cookie_auth
		$this->db->where('id', $this->session->userdara('userid'));
		$this->db->update('users', array('cookie_auth'=>$cookie_auth));

		return True;
	}

	# 用户登录
	public function login()
	{
		$data = array(
			'email'    => $this->input->post('email'),
			'password' => encryp_pass( $this->input->post('password') ),
		);

		$query = $this->db->get_where('users', $data);
		if ( ! $data = $query->row_array() )
			die('用户名密码错误');

		$this->session->set_userdata(array(
			'userid' => $data['id'],
			'email' => $data['email'],
			'username' =>$data['username'],
		));

		# 如果选中记住我 添加cookie
		# if ( $this->input->post('is_remember') ) {
			$cookie_auth = encryp_pass(time());
			set_cookie( $data['id'], $cookie_auth);

			# 更新数据库用户的cookie_auth
			$this->db->where('id', $data['id']);
			$this->db->update('users', array('cookie_auth'=>$cookie_auth));
		# }
		return True;
	}

	public function create($data)
	{
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	public function update()
	{
		
	}
}