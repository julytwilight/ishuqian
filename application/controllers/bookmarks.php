<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 有关书签的操作
 * @author Seven
 */

class Bookmarks extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		# 如果用户没有登录 跳转到首页或登陆页面
		if ( !$this->session->userdata('userid') )
			redirect('/');

		$this->load->model('bookmarks_model');
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');

		if ($this->form_validation->run() === False) {
			die('Not empty!');
		} else {
			$this->bookmarks_model->create();
			redirect('/home/favorites_list');
		}
	}
}