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
		$this->load->model('employer_model');
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
		
		$this->data['template'] = 'nhatuyendung/notification/view';
		$this->load->view('nhatuyendung/main',$this->data);
	}
	function index(){
		
		$login_job = $this->session->userdata('user2_login');
		$this->data['user2_login'] = $login_job ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_job){
			$this->load->model('jobseeker_model');
			$jobseeker_info = $this->jobseeker_model->get_info($login_job);
			$this->data['jobseeker_info'] = $jobseeker_info;
		// 			/// lay dánh sách đăng tin của nhà tuyển dụng đó
			$this->load->model('saveresume_model');
			$input['where'] = array('iJob_ID'=>$jobseeker_info->id,);
			$list = $this->saveresume_model->get_list($input);
			$this->data['list'] = $list;
		// 			///lấy tổng số	
			if($list){
				// $total = $this->saveresume_model->get_total($input);
				// $this->data['total'] = $total;
		// 			///danh sách 
				$this->load->model('employer_model');
				foreach ($list as  $value) {
					$info[] = $this->employer_model->get_info($value->iEmploy_ID);
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
				$data =array('iResumeID'=>0);
				foreach ($list as $value) {
					$this->saveresume_model->update($value->id,$data);	
				}

			}
			
		}

		$this->data['template'] = 'nguoitimviec/notification/index';
		$this->load->view('nguoitimviec/main',$this->data);
	}
}