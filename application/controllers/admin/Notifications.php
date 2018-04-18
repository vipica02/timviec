<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Notifications extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('employer_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$input = array();
		$input['where'] = array('iUnsubscribe'=>1); 
		$list = $this->employer_model->get_list($input);
		$this->data['list']=$list;
		// $input = array();
		// $input['where'] = array('iUnsubscribe'=>1);
		// $total_empoyer = $this->employer_model->get_total($input);
		// $this->data['total_empoyer']=$total_empoyer;
		///
			$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='admin/notifications/index';
		$this->load->view('admin/main',$this->data);
	}
	function edit(){

		$input = array();
		$input['where'] = array('iUnsubscribe'=>1); 
		$list = $this->employer_model->get_list($input);
		$this->data['list']=$list;
		$input = array();
		$input['where'] = array('iUnsubscribe'=>1);
		$total_empoyer = $this->employer_model->get_total($input);
		$this->data['total_empoyer']=$total_empoyer;
		////
		$id = $this->uri->rsegment('3');
		$info = $this->employer_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không danh sách nhà tuyển dụng');
			redirect(admin_url('notifications'));
		}
		$data = array('iUnsubscribe'=>0);
		$this->employer_model->update($id,$data);
		$this->session->set_flashdata('message','Lưu dữ liệu thành công');
			redirect(admin_url('notifications'));
	}
	
}