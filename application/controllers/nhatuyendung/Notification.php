<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Notification extends MY_Controller
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
	/*
	*lay sanh sach
	*/
	///
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
	function view(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$id = $this->uri->rsegment('3');
		$info = $this->saveresume_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(nhatuyendung_url('notification'));
		}
		$this->data['info']=$info;
		////lây tên 
		$info_jobseeker  = $this->jobseeker_model->get_info($info->iJob_ID);
		$this->data['info_jobseeker'] = $info_jobseeker;
		$info_city = $this->city_model->get_info($info_jobseeker->iCityID);
		$this->data['info_city'] = $info_city;
		///lấy trong hồ sơ
		$info_jop = $this->job_model->get_info($info->iJobseekerID);
		$this->data['info_jop'] = $info_jop;
		///kinh nghiệm
		$info_exp = $this->experience_model->get_info($info_jop->sExperience);
		$this->data['info_exp'] = $info_exp;
		//trình độ
		$info_diploma = $this->diploma_model->get_info($info_jop->iDiplomaID);
		$this->data['info_diploma'] = $info_diploma;
		//lơi làm việc
		$info_city_2 = $this->city_model->get_info($info_jop->iCityID);
		$this->data['info_city_2'] = $info_city_2;
		//ngành nghề
		$info_career = $this->career_model->get_info($info_jop->iCareerID);
		$this->data['info_career'] = $info_career;
		$data =array('iStatus'=>0,'iResumeID'=>1);
		$this->saveresume_model->update($id,$data);	
		$this->data['template'] = 'nhatuyendung/notification/view';
		$this->load->view('nhatuyendung/main',$this->data);
	}
	function index(){
		
		$login_employer = $this->session->userdata('user_login');
		$this->data['user_login'] = $login_employer ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_employer){
		// 			//tim id nhaf tuyen dung
			$this->load->model('employer_model');
			$employer_info = $this->employer_model->get_info($login_employer);
			$this->data['employer_info'] = $employer_info;
		// 			/// lay dánh sách đăng tin của nhà tuyển dụng đó
			$this->load->model('saveresume_model');
			$input['where'] = array('iEmploy_ID'=>$employer_info->id,);
			$list = $this->saveresume_model->get_list($input);
			$this->data['list'] = $list;
		// 			///lấy tổng số	
			if($list){
				// $total = $this->saveresume_model->get_total($input);
				// $this->data['total'] = $total;
		// 			///danh sách 
				$this->load->model('jobseeker_model');
				foreach ($list as  $value) {
					$info[] = $this->jobseeker_model->get_info($value->iJob_ID);
				}
				$this->data['info'] = $info;
		// 			/// danh sach ho so
				$this->load->model('trustworthy_model');
				foreach ($list as  $value) {
					$info_job[] = $this->trustworthy_model->get_info($value->iEmployerID);
				}
				$this->data['info_job'] = $info_job;
		// 	/// lấy tên hồ sơ
				foreach ($list as  $value) {
					$info_jobseeker[] = $this->job_model->get_info($value->iJobseekerID);
				}
				$this->data['info_jobseeker'] = $info_jobseeker;
				// $data =array('iStatus'=>0,'iResumeID'=>);
				// foreach ($list as $value) {

				// 	$this->saveresume_model->update($value->id,$data);	
				// }

			}
			
		}

		$this->data['template'] = 'nhatuyendung/notification/index';
		$this->load->view('nhatuyendung/main',$this->data);
	}
}