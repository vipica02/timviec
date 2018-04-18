<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Search extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('slider_model');
		$this->load->model('career_model');
		$this->load->model('trustworthy_model');
		$this->load->model('employer_model');
		$this->load->model('trustworthy_model');
		$this->load->model('experience_model');
		$this->load->model('wege_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$key = $this->input->get('search');
		$this->data['key'] = trim($key);
		$input = array();
		$input['like'] = array('sJobTitle',$key);
		//$input['like'] = array('sJobContent',$key);
		$input['where']= array('iCurrent'=>1);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list'] = $list;
		foreach ($list as $value) {
			$info_company[] = $this->employer_model->get_info($value->iEmployerID);
		}
		$this->data['info_company'] = $info_company;
		foreach ($list as $value) {
			$info_exp[] = $this->experience_model->get_info($value->iExperienceID);
		}
		$this->data['info_exp'] = $info_exp;
		foreach ($list as $value) {
			$info_money[] = $this->wege_model->get_info($value->iWageID);
		}
		$this->data['info_money'] = $info_money;
		if(!$info_money && !$info_company && !$info_exp){
		  	$this->session->set_flashdata('message','không tim thấy từ khóa tìm kiếm');
		 	redirect(base_url('search/error'));
		 }
		$this->data['template'] ='site/search/index';
		$this->load->view('site/main',$this->data);
	}
	
	function search(){
		$key = $this->input->get('diploma');
		if(empty($key)){
			$this->data['key'] = trim($key);	
		}
		
		$key2 = $this->input->get('wege');
		if(empty($key2)){
			$this->data['key2'] = trim($key2);	
		}
		
		$key3 = $this->input->get('city');
		if(empty($key3)){
			$this->data['key3'] = trim($key3);
		}
		$key4 = $this->input->get('career');
		if(empty($key4)){
			$this->data['key4'] = trim($key4);		
		}

		$input = array();
		//$input['like'] = array('sJobTitle',$key);
		$input['where']= array('iCurrent'=>1,'iDiplomaID'=>$key,'iWageID'=>$key2,'iCityID'=>$key3,'iCareerID'=>$key4);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list'] = $list;
		foreach ($list as $value) {
			$info_company[] = $this->employer_model->get_info($value->iEmployerID);
		}
		$this->data['info_company'] = $info_company;
		foreach ($list as $value) {
			$info_exp[] = $this->experience_model->get_info($value->iExperienceID);
		}
		$this->data['info_exp'] = $info_exp;
		foreach ($list as $value) {
			$info_money[] = $this->wege_model->get_info($value->iWageID);
		}
		$this->data['info_money'] = $info_money;
		if(!$info_money && !$info_company && !$info_exp){
		  	$this->session->set_flashdata('message','không tim thấy từ khóa tìm kiếm');
		 	redirect(base_url('search/error'));
		 }
		$this->data['template'] ='site/search/index';
		$this->load->view('site/main',$this->data);
	}

	function error(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='site/error';
		$this->load->view('site/main',$this->data);
	}
	function dangki(){
		$this->data['template'] ='site/dangki/index';
		$this->load->view('site/main',$this->data);
	}
}