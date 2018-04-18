<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/


class Home extends MY_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('diploma_model');
		$this->load->model('experience_model');
		$this->load->model('rank_model');
		$this->load->model('career_model');
		$this->load->model('city_model');
		$this->load->model('jobseeker_model');
		$this->load->model('trustworthy_model');
		$this->load->model('wege_model');
		$this->load->model('scale_model');
		$this->load->model('naturework_model');
		$this->load->model('formwork_model');
		$this->load->model('probationary_model');
		$this->load->model('career_model');
		$this->load->model('saveresume_model');
		$this->load->model('employer_model');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}	
	function index(){
		$login_job = $this->session->userdata('user2_login');
		$this->data['user2_login'] = $login_job ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_job){
			$this->load->model('jobseeker_model');
			$jobseeker_info = $this->jobseeker_model->get_info($login_job);
			$this->data['jobseeker_info'] = $jobseeker_info;
		}
		$this->load->model('job_model');
		$tong = $this->job_model->get_sum('iHitview',array('iJobID'=>$jobseeker_info->id));
		$this->data['tong']  = $tong;
		///danh sach ho so dã nọp
		$this->load->model('saveresume_model');
		$input = array();
		$input['where'] = array('iJob_ID'=>$jobseeker_info->id);
		$total = $this->saveresume_model->get_total($input);
		$this->data['total']  = $total;
		///tong so ho sơ
		$input_job = array();
		$input_job['where'] = array('iJobID'=>$jobseeker_info->id);
		$total_job = $this->job_model->get_total($input_job);
		$this->data['total_job']  = $total_job;
		////danh sach cong viec
		$this->load->model('career_model');
		$input_career = array();
		$list_career = $this->career_model->get_list($input_career);
		$this->data['list_career']=$list_career;
				////thanh pho
		$this->load->model('city_model');
		$input_city = array();
		$list_city = $this->city_model->get_list($input_city);
		$this->data['list_city']=$list_city;
				///lấy danh sách menu danh mục
		$this->load->model('category_model');
		$input_category= array();
				//$input_category['where'] = array('');
		$list_category = $this->category_model->get_list($input_category);
		$this->data['list_category'] = $list_category;
		///danh sách vip
		//	$this->load->model('employer_model');
		$input_vip = array();
		$input_vip['where'] = array('iStatus'=>2);
		$list_vip = $this->employer_model->get_list($input_vip);
		$this->data['list_vip'] = $list_vip;
		
		$this->data['template'] = 'nguoitimviec/home/index';
		$this->load->view('nguoitimviec/main',$this->data);
	}
}