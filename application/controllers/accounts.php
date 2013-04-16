<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 用户的登陆 注册 以及资料修改的
 * @author Seven
 */

class Accounts extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	/**
	 * 用户登陆
	 * 
	 */
	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|max_length[20]');

		if ($this->form_validation->run() === False) {
			die('Not empty!');
		} else {
			$this->users_model->login();
			redirect('/home');
		}
	}

	/**
	 * 用户注册
	 * 
	 */
	public function register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() === False) {
			$this->load->view('welcome_message');
		} else {
			$this->users_model->register();
			redirect('/');
		}
	}

	/**
	 * 用户退出
	 * 
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->helper('cookie');
		setcookie("ishuqian_user_id", '', time() - 3600 * 24 * 30, '/');
        setcookie("ishuqian_cookie_auth", '', time() - 3600 * 24 * 30, '/');
		redirect('/');
	}

	/**
	 * 登陆页面
	 * 
	 */
	public function signin()
	{
		
	}

	/**
	 * 注册页面
	 * 
	 */
	public function signup()
	{
		
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */