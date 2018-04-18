<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class User_jobseeker extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('jobseeker_model');
		$this->load->model('city_model');
		$this->load->model('saveresume_model');
		$this->load->model('trustworthy_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function check_email(){
		$email = $this->input->post('email');
		$where  = array('sEmail'=> $email );
		if($this->employer_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,'Email này đã tồn tại');
			return false;
		}
		return true;
	}
	
	function edit(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		$input = array();
		$list = $this->city_model->get_list($input);
		$this->data['list']=$list;
		// $input1 = array();
		// $list1 = $this->scale_model->get_list($input1);
		// $this->data['list1']=$list1;

		$login_job = $this->session->userdata('user2_login');
		$this->data['user2_login'] = $login_job ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_job){
			$this->load->model('jobseeker_model');
			$jobseeker_info = $this->jobseeker_model->get_info($login_job);
			$this->data['jobseeker_info'] = $jobseeker_info;
		}
		$info = $this->city_model->get_info($jobseeker_info->iCityID);
		$this->data['info'] = $info;
		// $info2 = $this->scale_model->get_info($employer_info->iScale);
		// $this->data['info2'] = $info2;


		if($this->input->post()){
			$email = $this->input->post('email');
			if($email){
				$this->form_validation->set_rules('email','Email','required|valid_email');
			}
			
			$pass = $this->input->post('password');
			if($pass){
				$this->form_validation->set_rules('password','Password','required|min_length[8]');
				$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');		
			}

			$this->form_validation->set_rules('name','Họ và tên','required');

			$this->form_validation->set_rules('adress','Địa chỉ','required');
			$stel = $this->input->post('stel');
			if($stel){
				$this->form_validation->set_rules('stel','Số điện thoại','required|numeric|min_length[10]|max_length[12]');
			}
			
			$this->form_validation->set_rules('gender','Giới tính','required');
			$this->form_validation->set_rules('date_birth','Năm sinh','required');
			//$this->form_validation->set_rules('snumecontact','Số điện thoại người liên hệ','required');
	
			if($this->form_validation->run()){
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$name = $this->input->post('name');
				$adress = $this->input->post('adress');
				$stel = $this->input->post('stel');
				$scity = $this->input->post('scity');
				$gender = $this->input->post('gender');
				$date_birth = $this->input->post('date_birth');
				$timenow = standard_date('DATE_ATOM', time());
				$this->load->library('upload_library');
				$upload_path = './uploads/jobseeker';
				$upload_data = $this->upload_library->upload($upload_path,'image');
				$image_link ='';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				if($image_link !=''){
					$image_link = $upload_data['file_name'];
				}
				$date_register = standard_date('DATE_ATOM', time());
				$data = array(
					//'sEmail'=>$email,
					'sUserName'=>$name,
					'sAddress'=>$adress,
					//'sPhone'=>$stel,
					'iCityID'=>$scity,
					'dBirthday'=> nice_date($date_birth,'y-m-d') ,
					'iGender'=>$gender,
					'sUpdate'=>$timenow,
				);
				if($pass){
					$data['sPass'] = $pass;	
				}
				if($image_link){
					$data['sImage'] = $image_link;
				}
				if($stel){
					$data['sPhone'] = $stel;
				}
				if($email){
					$data['sEmail'] = $email;
				}
				
				if($this->jobseeker_model->update($jobseeker_info->id,$data)){
					$this->session->set_flashdata('message','Sửa dữ liệu thành công');
				} else{
					$this->session->set_flashdata('message','Không thành công');
				}
				redirect(nguoitimviec_url('user_jobseeker/edit'));
			}
		}
		$this->data['template'] ='nguoitimviec/user_jobseeker/edit';
		$this->load->view('nguoitimviec/main',$this->data);
	}

	function logout(){
		if($this->session->userdata('user2_login')){
			$this->session->unset_userdata('user2_login');
		}
		redirect(nguoitimviec_url('user2_login'));
	}

	function submit(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$id = $this->uri->rsegment('3');
		$login_job = $this->session->userdata('user2_login');
		$this->data['user2_login'] = $login_job ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_job){
			$this->load->model('jobseeker_model');
			$jobseeker_info = $this->jobseeker_model->get_info($login_job);
			$this->data['jobseeker_info'] = $jobseeker_info;
		}
		$jobID = $jobseeker_info->id;
		$input = array();
		$input['where'] = array('iJobID'=>$jobID);
		$list = $this->job_model->get_list($input);
		$this->data['list']=$list;
		// if(!isset($list)){
		// 	$this->session->set_flashdata('message','Không tồn tại hồ sơ');
		// }tong ho so
		$input_job = array();
		$input_job['where'] = array('iJobID'=>$jobseeker_info->id);
		$total_job = $this->job_model->get_total($input_job);
		$this->data['total_job']  = $total_job;

		//lay thong tin cua nha tuyen dung
		$info = $this->trustworthy_model->get_info($id);
		$this->data['info'] = $info;
		
		//neu ma co du lieu post len th i kiem tra

		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post()){
			$this->form_validation->set_rules('title','Thành phố','required');
			
		}
		if($this->form_validation->run()){
			
			//$employ = $info->iEmployerID; 
			$name = $this->input->post('title');
			$time_now = standard_date('DATE_ATOM', time());
			$data = array(
				'iJobseekerID' => $name,
				'iEmployerID'  => $id,
				'iEmploy_ID'   => $info->iEmployerID,
				'dDatePosted'  => $time_now,
				'iStatus'      => 1,
				'iJob_ID'      => $jobID,
				);
			if($this->saveresume_model->create($data)){
				$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(nguoitimviec_url('search/search_city'));
		}
		$this->data['template'] ='nguoitimviec/submit/index';
		$this->load->view('nguoitimviec/main',$this->data);
	}	
}