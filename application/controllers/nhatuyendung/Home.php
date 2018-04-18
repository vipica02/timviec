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

		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	function index(){
		$login_employer = $this->session->userdata('user_login');
		$this->data['user_login'] = $login_employer ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_employer){
					//tim id nhaf tuyen dung
			$this->load->model('employer_model');
			$employer_info = $this->employer_model->get_info($login_employer);
			$this->data['employer_info'] = $employer_info;
		}
		$this->load->model('trustworthy_model');
		$tong = $this->trustworthy_model->get_sum('iHitView',array('iEmployerID'=>$employer_info->id));
		$this->data['tong']  = $tong;
		////tinh so lương ho sơ đang kí
		$this->load->model('saveresume_model');
		$input = array();
		$input['where'] = array('iEmploy_ID'=>$employer_info->id);
		$total = $this->saveresume_model->get_total($input);
		$this->data['total']  = $total;
		////tổng tin đã đăng
		$input_job = array();
		$input_job['where'] = array('iEmployerID'=>$employer_info->id);
		$total_job =  $this->trustworthy_model->get_total($input_job);
		$this->data['total_job']  = $total_job;

		////danh sách hồ sơ các tỉnh thành phố
		$input_list = array();
		$input_list['where'] = array('iCityID'=>$employer_info->iCityID);
		$list = $this->job_model->get_list($input_list);
		$this->data['list'] = $list;
		if($list){
			foreach ($list as  $value) {
				$info[] = $this->jobseeker_model->get_info($value->iJobID);
			}
			$this->data['info'] = $info;
		}
		///////////////danh sach tin tuyen
		$id_employer  = $employer_info->id;
		$input = array();
		$input['where'] = array('iEmployerID'=>$id_employer);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list']=$list;
		foreach ($list as  $value) {
			$inpu = array();
			$inpu['where'] = array('iEmployerID'=>$value->id);
			$total2[] = $this->saveresume_model->get_total($inpu);		
		}
		if(!empty($total)){
			$this->data['total2']=$total2;
		}
		$this->data['template'] = 'nhatuyendung/home/index';
		$this->load->view('nhatuyendung/main',$this->data);
	}

}