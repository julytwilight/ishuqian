<?php

/**
 * Users Model
 * @author Seven
 */
class Users_model extends CI_Model
{
	# 创建用户
	public function register()
	{
		$data = array(
			'email'    => $this->input->post('email'),
			'password' => $this->encryp_pass( $this->input->post('password') ),
			'addtime'  => time(),
		);

		if ( !$this->db->insert('users', $data) )
			die('用户注册失败');
		
		$this->session->set_userdata(array(
			'userid' => $this->db->insert_id(),
			'email' => $this->input->post('email'),
			'username' => '',
		));

		return True;
	}

	# 用户登录
	public function login()
	{
		$data = array(
			'email'    => $this->input->post('email'),
			'password' => $this->encryp_pass( $this->input->post('password') ),
		);

		$query = $this->db->get_where('users', $data);
		if ( ! $data = $query->row_array() )
			die('用户名密码错误');

		$this->session->set_userdata(array(
			'userid' => $data['id'],
			'email' => $data['email'],
			'username' => $data['username'],
		));

		# 如果选中记住我 添加cookie
		if ( $this->input->post('is_remember') ) {
			setcookie("ishuqian_user_id", $data['id'], time() + 3600 * 24 * 30, '/');
			$cookie_auth = $this->encryp_pass(time());
        	setcookie("ishuqian_cookie_auth", $cookie_auth, time() + 3600 * 24 * 30, '/');
			# 更新数据库用户的cookie_auth
			$this->db->where('id', $data['id']);
			$this->db->update('users', array('cookie_auth'=>$cookie_auth));
		}
		return True;
	}

	public function update()
	{
		
	}

	# 密码加密
	public function encryp_pass($pass)
	{
		return md5(md5($pass.$this->config->item('encryption_key')));
	}
}