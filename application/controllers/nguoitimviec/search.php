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
		$this->load->model('employer_model');
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
	function search_all(){
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
	
		$this->data['template'] ='nguoitimviec/search/view_all';
		$this->load->view('nguoitimviec/main',$this->data);

	}

	function search_city(){
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
	
		$this->data['template'] ='nguoitimviec/search/view_city';
		$this->load->view('nguoitimviec/main',$this->data);

	}
	function search_diploma(){
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
			$info_diploma[] = $this->diploma_model->get_info($value->iDiplomaID);
		}
		$this->data['info_diploma'] = $info_diploma;
	
		$this->data['template'] ='nguoitimviec/search/view_diploma';
		$this->load->view('nguoitimviec/main',$this->data);

	}
	function search_wage(){
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
			$info_wage[] = $this->wege_model->get_info($value->iWageID);
		}
		$this->data['info_wage'] = $info_wage;
	
		$this->data['template'] ='nguoitimviec/search/view_wage';
		$this->load->view('nguoitimviec/main',$this->data);

	}
	function search_exp(){
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
			$info_exp[] = $this->experience_model->get_info($value->iExperienceID);
		}
		$this->data['info_wage'] = $info_exp;
	
		$this->data['template'] ='nguoitimviec/search/view_exp';
		$this->load->view('nguoitimviec/main',$this->data);

	}
	function search_scale(){
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
			$info_exp[] = $this->scale_model->get_info($value->iExperienceID);
		}
		$this->data['info_wage'] = $info_exp;
	
		$this->data['template'] ='nguoitimviec/search/view_scale';
		$this->load->view('nguoitimviec/main',$this->data);

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
	
		$this->data['template'] ='nguoitimviec/search/view_naturework';
		$this->load->view('nguoitimviec/main',$this->data);

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
	
		$this->data['template'] ='nguoitimviec/search/view_formwork';
		$this->load->view('nguoitimviec/main',$this->data);

	}
	function search_probationary(){
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
			$info_exp[] = $this->probationary_model->get_info($value->iProbationTimeID);
		}
		$this->data['info_wage'] = $info_exp;
	
		$this->data['template'] ='nguoitimviec/search/view_probationary';
		$this->load->view('nguoitimviec/main',$this->data);

	}

function search_career(){
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
			$info_exp[] = $this->career_model->get_info($value->iCareerID);
		}
		$this->data['info_wage'] = $info_exp;
	
		$this->data['template'] ='nguoitimviec/search/view_career';
		$this->load->view('nguoitimviec/main',$this->data);

	}

}