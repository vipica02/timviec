<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Home extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('slider_model');
		$this->load->model('career_model');
		$this->load->model('trustworthy_model');
		$this->load->model('employer_model');
		$this->load->model('post_model');
		$this->load->model('experience_model');
		$this->load->model('trustworthy_model');
		$this->load->model('diploma_model');
		$this->load->model('scale_model');
		$this->load->model('wege_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
	    // lấy thong tin slider
		$input = array();
		$list = $this->slider_model->get_list($input);
		$this->data['list']=$list;
//		var_dump($list);
//		die();
		$total = $this->slider_model->get_total();
		$this->data['total']=$total;
		// $input_career = array();
		// $list_career = $this->career_model->get_list($input);
		// $this->data['list_career']=$list_career;
		////danh sách vip
		$input_vip = array();
		$input_vip['where'] = array('iStatus'=>2);
		$list_vip =  $this->employer_model->get_list($input_vip);
		$this->data['list_vip'] = $list_vip;
		///bai viết
		$input_post = array();
		$list_post = $this->post_model->get_list($input_post);
		$this->data['list_post']=$list_post;
		
		//<---Kinh nghiêm---->//
		$input_exp = array();
		$list_exp = $this->experience_model->get_list($input_exp);
		
		///danh sách công việc
            foreach ($list_exp as $value) {
			$input_cere = array();
			$input_cere['where']= array('iExperienceID'=>$value->id);
			$list_cere = $this->trustworthy_model->get_list($input_cere);	
			$value->list_cere = $list_cere;
		}
		///lay danh sach nha tuyen dung

		$this->data['list_exp']=$list_exp;
		//pre($list_exp);
		
		foreach ($list_cere as $key ) {
			//$input_employ = array();
			//$input_employ['where'] = array('');
 			$list_employ[] = $this->employer_model->get_info($key->iEmployerID);
		}
		if(!empty($list_employ)){
			$this->data['list_employ'] = $list_employ;
		}
		///<----đóng--->
		///danh sách trình độ
		$input_diploma = array();
		$list_diploma = $this->diploma_model->get_list($input_diploma);
		$this->data['list_diploma'] = $list_diploma;

		///quy mô
		$input_scale = array();
		$list_scale = $this->scale_model->get_list($input_scale);
		$this->data['list_scale'] = $list_scale;
		//tiền lương

		$input_money = array();
		$list_money = $this->wege_model->get_list($input_money);
		$this->data['list_money'] = $list_money;
		
		// $login_employer = $this->session->userdata('user_login');
		// $this->data['user_login'] = $login_employer ;
		// 		//neu ton tai login thi lay thong tin các thanh vien
		// if($login_employer){
		// 	$this->load->model('employer_model');
		// 	$employer_info = $this->employer_model->get_info($login_employer);
		// 	$this->data['employer_info'] = $employer_info;
		// }
		// 		///ton tai login nguoi tim viec
		// $login_job = $this->session->userdata('user2_login');
		// $this->data['user2_login'] = $login_job ;
		// if($login_job){
		// 	$this->load->model('jobseeker_model');
		// 	$jobseeker_info = $this->jobseeker_model->get_info($login_job);
		// 	$this->data['jobseeker_info'] = $jobseeker_info;
		// }
		// 		//xu ly du lieu trang ngoai
		// ///
		$this->data['template'] ='site/bottom';
		$this->load->view('site/main',$this->data);
	}
	function dangki(){
		$this->data['template'] ='site/dangki/index';
		$this->load->view('site/main',$this->data);
	}
}