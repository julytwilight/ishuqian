<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 社交账号callback
 * @author Seven
 */
class Callback extends MY_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('user');
		$this->load->model('sns_model');
		$this->load->model('users_model');
	}

	public function weibo()
	{
		# 载入 libraries/Weibo.php
		$this->load->library('weibo');

		if (isset($_REQUEST['code'])) {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = $this->weibo->callback_url;
			$token = $this->weibo->get_access_token('code', $keys);
		}

		if ( $data = $this->sns_model->is_exist($token['uid']) ) {
			$user_id = $data['user_id'];
			$username = $data['username'];
			$this->session->set_userdata(array(
				'userid' => $user_id,
				'email' => '',
				'username' => $username,
			));
		} else {
			# 插入user表
			$userinfo = $this->weibo->get_userinfo($token['access_token'], $token['uid']);
			$username = $userinfo['screen_name'];
			$user_id = $this->users_model->create(array(
				'username' => $username,
				'avatar' => $userinfo['profile_image_url'],
				'addtime' => time(),
			));
			$this->session->set_userdata(array(
				'userid' => $user_id,
				'email' => '',
				'username' => $username,
			));
			# 插入sns表
			$this->sns_model->create($token);
		}
		redirect('home');
	}
}