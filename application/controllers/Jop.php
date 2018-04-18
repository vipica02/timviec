<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Jop extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('career_model');
		$this->load->model('trustworthy_model');
		$this->load->model('employer_model');
		$this->load->model('experience_model');
		$this->load->model('wege_model');
		$this->load->model('diploma_model');
		$this->load->model('city_model');
		$this->load->model('naturework_model');
		$this->load->model('job_model');
		$this->load->model('jobseeker_model');
		$this->load->model('scale_model');
		$this->load->model('wege_model');
		$this->load->model('formwork_model');

		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function nganh_nghe(){
		$id = $this->uri->rsegment('3');
		///tiêu đề danh mục
		$info = $this->career_model->get_info($id);
		$this->data['info']=$info;
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại thông tin này');
			redirect(base_url('jop/error'));
		}
		///
		$this->data['title']='Danh sách công việc phù hợp với bạn';
		///danh sách công việc trong nhóm danh mục ngành nghề
		$input = array();
		$input['where'] = array('iCareerID'=>$id,'iCurrent'=>1);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list'] = $list;
		////danh sach ten cong ty trong nhom danh muc
		//$input_company = array();
		foreach ($list as $value) {
			$info_company[] = $this->employer_model->get_info($value->iEmployerID);
		}
		$this->data['info_company'] = $info_company;
		 // if(!$info_company){
		 // 	$this->session->set_flashdata('message','không tồn tại thông tin này');
			// redirect(base_url('jop/error'));
		 // }
		//danh sach kinh nghiệm
		foreach ($list as $value) {
			$info_exp[] = $this->experience_model->get_info($value->iExperienceID);
		}
		$this->data['info_exp'] = $info_exp;
		 // if(!$info_exp){
		 // 	$this->session->set_flashdata('message','không tồn tại thông tin này');
			// redirect(base_url('jop/error'));
		 // }
		///Tiền lương
		foreach ($list as $value) {
			$info_money[] = $this->wege_model->get_info($value->iWageID);
		}
		$this->data['info_money'] = $info_money;
		///bắt lỗi nếu quá hạn
		//  if(!$info_money){
		//  	$this->session->set_flashdata('message','không tồn tại thông tin này');
		// 	redirect(base_url('jop/error'));
		// }
		if(!$info_money && !$info_company && !$info_exp){
		  	$this->session->set_flashdata('message','không tồn tại thông tin này');
		 	redirect(base_url('jop/error'));
		 }
		
		$this->data['template'] ='site/career/view';
		$this->load->view('site/main',$this->data);
	}
	function trinh_do(){

		$id = $this->uri->rsegment('3');
		///tiêu đề danh mục
		$info = $this->diploma_model->get_info($id);
		$this->data['info']=$info;
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại thông tin này');
			redirect(base_url('jop/error'));
		}
		$this->data['title']='Danh sách công việc phù hợp với bạn';
		///danh sách công việc trong nhóm danh mục ngành nghề
		$input = array();
		$input['where'] = array('iDiplomaID'=>$id,'iCurrent'=>1);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list'] = $list;
		foreach ($list as $value) {
			$info_company[] = $this->employer_model->get_info($value->iEmployerID);
		}
		///kinh nghiệm
		foreach ($list as $value) {
			$info_exp[] = $this->experience_model->get_info($value->iExperienceID);
		}
		$this->data['info_exp'] = $info_exp;
		 // if(!$info_exp){
		 // 	$this->session->set_flashdata('message','không tồn tại thông tin này');
			// redirect(base_url('jop/error'));
		 // }
		///Tiền lương
		foreach ($list as $value) {
			$info_money[] = $this->wege_model->get_info($value->iWageID);
		}
		$this->data['info_money'] = $info_money;
		///bắt lỗi nếu quá hạn
		//  if(!$info_money){
		//  	$this->session->set_flashdata('message','không tồn tại thông tin này');
		// 	redirect(base_url('jop/error'));
		// }
		if(!$info_money && !$info_company && !$info_exp){
		  	$this->session->set_flashdata('message','không tồn tại thông tin này');
		 	redirect(base_url('jop/error'));
		 }
		 
		$this->data['info_company'] = $info_company;
		$this->data['template'] ='site/career/diploma_view';
		$this->load->view('site/main',$this->data);

	}
	function quy_mo(){
		$id = $this->uri->rsegment('3');
		///tiêu đề danh mục
		$info = $this->scale_model->get_info($id);
		$this->data['info']=$info;
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại thông tin này');
			redirect(base_url('jop/error'));
		}
		$this->data['title']='Danh sách công việc phù hợp với bạn';
		///danh sách công việc trong nhóm danh mục ngành nghề
		$input = array();
		$input['where'] = array('iCareerID'=>$id,'iCurrent'=>1);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list'] = $list;
		foreach ($list as $value) {
			$info_company[] = $this->employer_model->get_info($value->iEmployerID);
		}
		///kinh nghiệm
		foreach ($list as $value) {
			$info_exp[] = $this->experience_model->get_info($value->iExperienceID);
		}
		$this->data['info_exp'] = $info_exp;
		 // if(!$info_exp){
		 // 	$this->session->set_flashdata('message','không tồn tại thông tin này');
			// redirect(base_url('jop/error'));
		 // }
		///Tiền lương
		foreach ($list as $value) {
			$info_money[] = $this->wege_model->get_info($value->iWageID);
		}
		$this->data['info_money'] = $info_money;
		///bắt lỗi nếu quá hạn
		//  if(!$info_money){
		//  	$this->session->set_flashdata('message','không tồn tại thông tin này');
		// 	redirect(base_url('jop/error'));
		// }
		if(!$info_money && !$info_company && !$info_exp){
		  	$this->session->set_flashdata('message','không tồn tại thông tin này');
		 	redirect(base_url('jop/error'));
		 }
		 
		$this->data['info_company'] = $info_company;
		$this->data['template'] ='site/career/diploma_view';
		$this->load->view('site/main',$this->data);
	}
	
	function tien_luong(){
		$id = $this->uri->rsegment('3');
		///tiêu đề danh mục
		$info = $this->wege_model->get_info($id);
		$this->data['info']=$info;
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại thông tin này');
			redirect(base_url('jop/error'));
		}
		///
		$this->data['title']='Danh sách công việc phù hợp với bạn';
		///danh sách công việc trong nhóm danh mục ngành nghề
		$input = array();
		$input['where'] = array('iWageID'=>$id,'iCurrent'=>1);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list'] = $list;
		////danh sach ten cong ty trong nhom danh muc
		//$input_company = array();
		foreach ($list as $value) {
			$info_company[] = $this->employer_model->get_info($value->iEmployerID);
		}
		$this->data['info_company'] = $info_company;
		 // if(!$info_company){
		 // 	$this->session->set_flashdata('message','không tồn tại thông tin này');
			// redirect(base_url('jop/error'));
		 // }
		//danh sach kinh nghiệm
		foreach ($list as $value) {
			$info_exp[] = $this->experience_model->get_info($value->iExperienceID);
		}
		$this->data['info_exp'] = $info_exp;
		 // if(!$info_exp){
		 // 	$this->session->set_flashdata('message','không tồn tại thông tin này');
			// redirect(base_url('jop/error'));
		 // }
		///Tiền lương
		foreach ($list as $value) {
			$info_money[] = $this->wege_model->get_info($value->iWageID);
		}
		$this->data['info_money'] = $info_money;
		///bắt lỗi nếu quá hạn
		//  if(!$info_money){
		//  	$this->session->set_flashdata('message','không tồn tại thông tin này');
		// 	redirect(base_url('jop/error'));
		// }
		if(!$info_money && !$info_company && !$info_exp){
		  	$this->session->set_flashdata('message','không tồn tại thông tin này');
		 	redirect(base_url('jop/error'));
		 }
		
		$this->data['template'] ='site/career/wage_view';
		$this->load->view('site/main',$this->data);
	}
	function cong_viec(){

		$id = $this->uri->rsegment('3');
		///show loi
		$info = $this->trustworthy_model->get_info($id);
		$this->data['info']=$info;
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại thông tin này');
			redirect(base_url('jop/error'));
		}
		///lấy danh sách tên công ty
		$info_company = $this->employer_model->get_info($info->iEmployerID);
		$this->data['info_company']=$info_company;
		if(!$info_company){
			$this->session->set_flashdata('message','không tồn tại thông tin này');
			redirect(base_url('jop/error'));
		}
		////mức lương
		$info_wage = $this->wege_model->get_info($info->iWageID);
		$this->data['info_wage']=$info_wage;
		///kinh nghiêm
		$info_exp = $this->experience_model->get_info($info->iExperienceID);
		$this->data['info_exp']=$info_exp;
		///trình độ
		$info_diploma = $this->diploma_model->get_info($info->iDiplomaID);
		$this->data['info_diploma'] = $info_diploma;
		///tinh/thanh phố
		$info_city = $this->city_model->get_info($info_company->iCityID);
		$this->data['info_city']=$info_city;
		///Ngành nghề
		$info_career = $this->career_model->get_info($info->iCareerID);
		$this->data['info_career']=$info_career;
		///tính chất công việc
		$info_naturework = $this->naturework_model->get_info($info->iNatureWorkID);
		$this->data['info_naturework']=$info_naturework;
		////Hình thức làm việc
		$info_formwork = $this->formwork_model->get_info($info->iFormWorkID);
		$this->data['info_formwork']=$info_formwork;
		//// lấy danh sách 
		$input_diploma = array();
		$list_diploma = $this->diploma_model->get_list($input_diploma);
		$this->data['list_diploma']=$list_diploma;
		//// lay danh sach tien luong
		$input_wege = array();
		$list_wege = $this->wege_model->get_list($input_wege);
		$this->data['list_wege']=$list_wege;
		////lay danh sach thanh pho
		$input_city = array();
		$list_city = $this->city_model->get_list($input_city);
		$this->data['list_city']=$list_city;
		///lay danh sach nganh nghe
		$input_career = array();
		$list_career = $this->career_model->get_list($input_career);
		$this->data['list_career']=$list_career;
		///
		$data = array('iHitView'=>$info->iHitView+1);
		$this->trustworthy_model->update($id,$data);
		$this->data['template'] ='site/career/jop_view';
		$this->load->view('site/main',$this->data);
	}
	function cong_ty(){
		$id = $this->uri->rsegment('3');
		/// tên công ty
		$info = $this->employer_model->get_info($id);
		$this->data['info']=$info;
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại thông tin này');
			redirect(base_url('jop/error'));
		}
		///lay quy mo
		$info_scale = $this->scale_model->get_info($info->iScale);
		$this->data['info_scale']=$info_scale;
		///
		$data = array(
			'iHitView'=>$info->iHitView+1,
			);
		$this->employer_model->update($id,$data);

		///////////lay danh sach cong viec
		$input = array();
		$input['where'] = array('iEmployerID'=>$id,'iCurrent'=>1);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list']= $list;
		///kinh nghiem
		foreach ($list as $value) {
			$info_exp[] = $this->experience_model->get_info($value->iExperienceID);
		}
		///Money
		foreach ($list as $value) {
			$info_money[] = $this->wege_model->get_info($value->iWageID);
		}
		$this->data['info_money'] = $info_money;
		$this->data['info_exp'] =$info_exp;
		/////
		$this->data['template'] ='site/career/company_view';
		$this->load->view('site/main',$this->data);
	}
	function viec_cong_ty(){
		$id = $this->uri->rsegment('3');
		///tiêu đề danh mục
		$info = $this->employer_model->get_info($id);
		$this->data['info']=$info;
		$input = array();
		$input['where'] = array('iEmployerID'=>$id,'iCurrent'=>1);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list']= $list;
		///kinh nghiem
		foreach ($list as $value) {
			$info_exp[] = $this->experience_model->get_info($value->iExperienceID);
		}
		///Money
		foreach ($list as $value) {
			$info_money[] = $this->wege_model->get_info($value->iWageID);
		}
		$this->data['info_money'] = $info_money;
		$this->data['info_exp'] =$info_exp;
		$this->data['template'] ='site/career/jop_company_view';
		$this->load->view('site/main',$this->data);
	}
	function hoso(){
		$id = $this->uri->rsegment('3');
		$info_job = $this->job_model->get_info($id);
		$this->data['info_job']=$info_job;
		if($info_job){
			 $info_jobseeker = $this->jobseeker_model->get_info($info_job->iJobID);
		 	$this->data['info_jobseeker']=$info_jobseeker;
		}
		if(!$info_job){
			$this->session->set_flashdata('message','không tồn tại thông tin này');
			redirect(base_url('jop/error'));
		}
		if($info_jobseeker){
			$info_city = $this->city_model->get_info($info_jobseeker->iCityID);
			$this->data['info_city']=$info_city;
		}
//	Kinh nghiem
		$info_exp = $this->experience_model->get_info($info_job->sExperience);
		$this->data['info_exp']=$info_exp;

//trình do
		$info_diploma = $this->diploma_model->get_info($info_job->iDiplomaID);
		$this->data['info_diploma']=$info_diploma;
//nơi làm việc mong muốn
		$info_workplace  = $this->city_model->get_info($info_job->iCityID);
		$this->data['info_workplace']=$info_workplace;
///ngành nghề
		$info_career  = $this->career_model->get_info($info_job->iCareerID);
		$this->data['info_career']=$info_career;

///hình thức làm việc
		// $info_naturework = $this->naturework_model->get_info($info_job->iCareerID);
		// $this->data['info_naturework']=$info_naturework;
		$data = array(
			'iHitview'=>$info_job->iHitview+1,
		);
		$this->job_model->update($id,$data);
		$this->data['template'] ='site/hoso/index';
		$this->load->view('site/main',$this->data);
	}

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
				redirect(base_url('job'));
			}
		}else{
			//$this->session->set_flashdata('message','Nhà tuyển dụng chưa upload giấy phép kinh doanh');
			redirect(base_url('job'));	
		}
		
	}
	function city(){
		$id = $this->uri->rsegment('3');
		
		$input =  array();
		$input['where'] = array('iCityID'=>$id);
		$list =  $this->employer_model->get_list($input);
		$this->data['list'] = $list;
		
		$this->data['template'] ='site/career/city_view';
		$this->load->view('site/main',$this->data);
	}
	function error(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='site/error';
		$this->load->view('site/main',$this->data);
	}
}