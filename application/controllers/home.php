<?php

/**
 * 用户登陆后的个人页面
 * @author Seven
 */
class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		# 如果用户没有登录 跳转到首页或登陆页面
		if ( !$this->session->userdata('userid') )
			redirect('/');

		$this->load->model('lists_model');
		$this->load->model('bookmarks_model');
	}

	# 个人页面
	public function index()
	{
		$this->favorites_list();
	}

	public function favorites_list($list_id = Null)
	{
		$this->load->helper('form');
		$data['lists'] = $this->lists_model->getList(0, 10, $this->session->userdata('userid'));
		$data['bookmarks'] = $this->bookmarks_model->getList(0, 10, $this->session->userdata('userid'), $list_id);
		$this->display('home/index', $data);
	}

	#########################  ajax Request  #########################

	# 读取标题
	public function readlink()
	{
		$this->load->helper('http');
		$link = $this->input->post('link');

		if ( !$link )
			die('not empyt');

		$link = http_url($link);

		$content = get_http_contents($link);
		preg_match('/<title>(.*)<\/title>/', $content, $title);
		
		if ( !$title[1] )
			die(Null);

		die($title[1]);
	}

	# 添加收藏夹
	public function addlist()
	{
		$name = $this->input->post('name');

		if ( !$name )
			die('not empyt');

		$data = $this->lists_model->addList($name);
		die(json_encode($data));
	}
}