<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Search extends MY_Controller
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
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/
	function download($fileName = NULL) {   
		if ($fileName) {
			   $file = realpath ( "uploads/jobseeker/hoso" ) . "\\" . $fileName;

    // check file exists    
			if (file_exists ( $file )) {
     // get file content
				$data = file_get_contents ( $file );
     //force download
				force_download ( $fileName, $data );
			} else {
     // Redirect to base url
				redirect(nhatuyendung_url('search'));
			}
		}else{
			//$this->session->set_flashdata('message','Nhà tuyển dụng chưa upload giấy phép kinh doanh');
			redirect(nhatuyendung_url('search'));	
		}
		
	}

	function search_all(){
		$input  =  array();
		$input['where'] = array('iDisplay'=>1);
		$list = $this->job_model->get_list($input);
		$this->data['list']=$list;
		foreach ($list as $value) {
			$info[] = $this->jobseeker_model->get_info($value->iJobID);
		}
		$this->data['info'] = $info;
		$this->data['template'] ='nhatuyendung/search/view_all';
		$this->load->view('nhatuyendung/main',$this->data);
	}

	function search_city(){
		// $input = array();
		// $list = $this->city_model->get_list($input);
		// $this->data['list']=$list;
		$input  =  array();
		$input['where'] = array('iDisplay'=>1);
		$list = $this->job_model->get_list($input);
		$this->data['list']=$list;
		foreach ($list as $value) {
			$info[] = $this->jobseeker_model->get_info($value->iJobID);
			$info_city[] = $this->city_model->get_info($value->iCityID);
		}
		$this->data['info'] = $info;
		$this->data['info_city'] = $info_city;

		$this->data['template'] ='nhatuyendung/search/view_city';
		$this->load->view('nhatuyendung/main',$this->data);

	}
	function search_diploma(){
		// $input = array();
		// $list = $this->city_model->get_list($input);
		// $this->data['list']=$list;
		$input  =  array();
		$input['where'] = array('iDisplay'=>1);
		$list = $this->job_model->get_list($input);
		$this->data['list']=$list;

		foreach ($list as $value) {
			$info[] = $this->jobseeker_model->get_info($value->iJobID);
			$info_diploma[] = $this->diploma_model->get_info($value->iDiplomaID);
		}
		$this->data['info'] = $info;
		///lấy danh sách học vấn
		$this->data['info_diploma'] = $info_diploma;
	
		$this->data['template'] ='nhatuyendung/search/view_diploma';
		$this->load->view('nhatuyendung/main',$this->data);

	}
	function search_wage(){
		// $input = array();
		// $list = $this->city_model->get_list($input);
		// $this->data['list']=$list;
		$input  =  array();
		$input['where'] = array('iDisplay'=>1);
		$list = $this->job_model->get_list($input);
		$this->data['list']=$list;

		foreach ($list as $value) {
			$info[] = $this->jobseeker_model->get_info($value->iJobID);
		}
		$this->data['info'] = $info;
		
	
		$this->data['template'] ='nhatuyendung/search/view_wage';
		$this->load->view('nhatuyendung/main',$this->data);

	}
	function search_exp(){
		// $input = array();
		// $list = $this->city_model->get_list($input);
		// $this->data['list']=$list;
		$input  =  array();
		$input['where'] = array('iDisplay'=>1);
		$list = $this->job_model->get_list($input);
		$this->data['list']=$list;

		foreach ($list as $value) {
			$info[] = $this->jobseeker_model->get_info($value->iJobID);
			$info_exp[] = $this->experience_model->get_info($value->sExperience);
		}
		$this->data['info'] = $info;

		///lấy danh sách học vấn

		$this->data['info_wage'] = $info_exp;
	
		$this->data['template'] ='nhatuyendung/search/view_exp';
		$this->load->view('nhatuyendung/main',$this->data);

	}
	
	function search_naturework(){
		// $input = array();
		// $list = $this->city_model->get_list($input);
		// $this->data['list']=$list;
		$input  =  array();
		$input['where'] = array('iCurrent'=>1);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list']=$list;
			foreach ($list as $value) {
			$info[] = $this->employer_model->get_info($value->iEmployerID);
		}
	
		$this->data['info'] = $info;

		$this->data['list']=$list;
			foreach ($list as $value) {
			$info[] = $this->employer_model->get_info($value->iEmployerID);
		}
		$this->data['info'] = $info;
		///lấy danh sách học vấn

		$this->data['list']=$list;
			foreach ($list as $value) {
			$info_exp[] = $this->naturework_model->get_info($value->iNatureWorkID);
		}
		$this->data['info_wage'] = $info_exp;
	
		$this->data['template'] ='nhatuyendung/search/view_naturework';
		$this->load->view('nhatuyendung/main',$this->data);

	}
	function search_formwork(){
		// $input = array();
		// $list = $this->city_model->get_list($input);
		// $this->data['list']=$list;
		$input  =  array();
		$input['where'] = array('iCurrent'=>1);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list']=$list;
			foreach ($list as $value) {
			$info[] = $this->employer_model->get_info($value->iEmployerID);
		}
	
		$this->data['info'] = $info;

		$this->data['list']=$list;
			foreach ($list as $value) {
			$info[] = $this->employer_model->get_info($value->iEmployerID);
		}
		$this->data['info'] = $info;
		///lấy danh sách học vấn

		$this->data['list']=$list;
			foreach ($list as $value) {
			$info_exp[] = $this->formwork_model->get_info($value->iFormWorkID);
		}
		$this->data['info_wage'] = $info_exp;
	
		$this->data['template'] ='nhatuyendung/search/view_formwork';
		$this->load->view('nhatuyendung/main',$this->data);

	}
	function search_rank(){
		// $input = array();
		// $list = $this->city_model->get_list($input);
		// $this->data['list']=$list;
		$input  =  array();
		$input['where'] = array('iDisplay'=>1);
		$list = $this->job_model->get_list($input);
		$this->data['list']=$list;

		foreach ($list as $value) {
			$info[] = $this->jobseeker_model->get_info($value->iJobID);
			$info_exp[] = $this->rank_model->get_info($value->iRankID);
		}
		$this->data['info'] = $info;
		///lấy danh sách học vấn
		$this->data['info_wage'] = $info_exp;
	
		$this->data['template'] ='nhatuyendung/search/view_rank';
		$this->load->view('nhatuyendung/main',$this->data);

	}

	function search_career(){
		// $input = array();
		// $list = $this->city_model->get_list($input);
		// $this->data['list']=$list;
		$input  =  array();
		$input['where'] = array('iDisplay'=>1);
		$list = $this->job_model->get_list($input);
		$this->data['list']=$list;

		foreach ($list as $value) {
			$info[] = $this->jobseeker_model->get_info($value->iJobID);
			$info_exp[] = $this->career_model->get_info($value->iCareerID);
		}
		$this->data['info'] = $info;
		///lấy danh sách học vấn
		$this->data['info_wage'] = $info_exp;
	
		$this->data['template'] ='nhatuyendung/search/view_career';
		$this->load->view('nhatuyendung/main',$this->data);

	}

}