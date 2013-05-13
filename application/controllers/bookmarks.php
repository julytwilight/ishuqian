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
			//redirect('/');  //modify by mark 2013-05-13 15:59:50 先注释掉

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

	/**
	 * 从本地html文件导入书签--首页
	 */
	public function import(){
		
		//echo $a;
		$data['name'] = 'meigong';
		$this->display('import', $data);
	}	
	

	/**
	 * 从本地html文件导入书签--功能
	 */
	public function importHtml(){
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'html|htm';
		  
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			echo "<pre>";print_r($error);   
			//$this->load->view('upload_form', $error);
		} 
		else{ //上传成功
			
			$data = $this->upload->data();
			$fileName = $data['full_path'];
			if(isset($fileName) && !empty($fileName)){
				
				//dom 解析
				$this->load->helper('html_parse');				
				$html = file_get_html($fileName);
				
				$dt = $html->find('dl',0)->children(2);
				if(isset($dt)){ //非chorme浏览器书签
					$arr = $html->find('dl',1)->find('dt');
				}else{  //chorme浏览器的书签
					 $arr = $html->find('dl',0)->find('dt');
				}
				$res = array();
				$m = 0;
				$n = 0;
				foreach($arr as $key=>$dt){ 
					if(isset($dt->children(0)->href)){ //获得分类下面的书签
						$n++;
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$dt->children(0)->plaintext;
						$res[$m]['list'][$n]['text'] = $dt->children(0)->plaintext;
						$res[$m]['list'][$n]['url'] = $dt->children(0)->href;
						$res[$m]['list'][$n]['icon'] = $dt->children(0)->icon;
					}else{ //获得分类
						
						$m ++;
						$res[$m]['cat'] = $dt->children(0)->plaintext;
						echo $dt->children(0)->plaintext;
					}
				
				  
				}
				echo "<pre>";print_r($res);			
				
			}
			//$data = array('upload_data' => $this->upload->data());   
			//$this->load->view('upload_success', $data);
		}		
	}	
	
	/**
	 * 打开书签
	 */
	public function show($id){
		if(empty($id) || !is_numeric($id)){
			show_404();
		}
		
		$this->load->model('bookmarks_model');
		$data['info']  = $this->bookmarks_model->getBookmarks($id);
		
		//echo "<pre>";print_r($res);exit;
		//echo $a;
		$data['name'] = 'meigong';
		$this->display('show', $data);
	}		
	
}