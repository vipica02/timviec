<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class User_login extends MY_Controller{
	
	function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post()){
			$this->form_validation->set_rules('user_login','login','callback_check_login');
			if($this->form_validation->run()){
				$user = $this->_get_user_info();
				$this->session->set_userdata('user_login', $user->id);	
							redirect(nhatuyendung_url('home'));
			}
		}
		$this->load->view('nhatuyendung/login/index');
	}

	// function check_login(){
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');
	// 	$this->load->model('admin_model');
	// 	$where = array('sEmail'=>$username,'sPassword'=>$password);
	// 	if($this->admin_model->check_exists($where)){
	// 		return true;
	// 	} 
	// 	$this->form_validation->set_message(__FUNCTION__,'Bạn không đăng nhập thành công');
	// 	return false;
	// }

	function check_login(){
		$user = $this->_get_user_info();
		if($user){
			return true;
		} 
		$this->form_validation->set_message(__FUNCTION__,'Bạn không đăng nhập thành công');
		return false;
	}
	private function _get_user_info(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('employer_model');
		$where = array('sEmail'=>$username,'sPass'=>$password);
		$user = $this->employer_model->get_info_rule($where);
		return $user; 
	}
}