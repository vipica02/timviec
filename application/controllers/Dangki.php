<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Dangki extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('employer_model');
		$this->load->model('city_model');
		$this->load->model('scale_model');
		$this->load->model('jobseeker_model');
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
	function check_email_jobseeker(){
		$email = $this->input->post('email');
		$where  = array('sEmail'=> $email );
		if($this->jobseeker_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,'Email này đã tồn tại');
			return false;
		}
		return true;
	}
	function check_email_contact(){
		
		$semail = $this->input->post('semailcontact');
		$where = array('sContactEmail'=>$semail);
		if($this->employer_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,'Email này đã tồn tại');
			return false;
		}
		return true;
	}

	function index(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['template'] ='site/dangki/index';
		$this->load->view('site/main',$this->data);
	}
	function nhatuyendung(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		if($this->input->post()){
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]');
			$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');		
			$this->form_validation->set_rules('scomname','Tên công ty','required|min_length[10]');
			$this->form_validation->set_rules('saddress','Địa chỉ','required');
			$this->form_validation->set_rules('stel','Số điện thoại','required|numeric|min_length[10]|max_length[12]');
			$this->form_validation->set_rules('scity','Tên thành phố','required');
			$this->form_validation->set_rules('sscale','Quy mô','required');
			$this->form_validation->set_rules('sprofile','Sơ lược về công ty','required');

			$this->form_validation->set_rules('sfax','Fax','required');
			$this->form_validation->set_rules('scontactname','Thông tin người liên hệ','required');
			$this->form_validation->set_rules('semailcontact','Email','required|valid_email|callback_check_email_contact');
			$this->form_validation->set_rules('snumecontact','Số điện thoại người liên hệ','required');
	
			if($this->form_validation->run()){
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$scomname = $this->input->post('scomname');
				$saddress = $this->input->post('saddress');
				$stel = $this->input->post('stel');
				$scity = $this->input->post('scity');
				$sscale = $this->input->post('sscale');
				$sprofile = $this->input->post('sprofile');
				$sfax = $this->input->post('sfax');
				$scontactname = $this->input->post('scontactname');
				$semailcontact = $this->input->post('semailcontact');
				$snumecontact = $this->input->post('snumecontact');
				//$statust = $this->input->post('statust');
				$timenow = standard_date('DATE_ATOM', time());
			
				$data = array(
					'sEmail'=>$email,
					'sPass'=> $password,
					'sComName'=>$scomname,
					'sAddress'=>$saddress,
					'sTel'=>$stel,
					'iCityID'=>$scity,
					'iScale'=>$sscale,
					'sProfile'=>$sprofile,
					'sFax'=>$sfax,
					'sContactName'=>$scontactname,
					'sContactEmail'=>$semailcontact,
					'sMobile'=>$snumecontact,
					'dDate_Register'=>$timenow,
					'iUnsubscribe'=>1,
					'iStatus'=>1,
				);
				if($this->employer_model->create($data)){
					$this->session->set_flashdata('message','Đăng kí  thành công');
				} else{
					$this->session->set_flashdata('message','Đăng kí thất bại');
				}
				redirect(base_url('dangki'));
			}
		}
		$input = array();
		$list = $this->city_model->get_list($input);
		$this->data['list']=$list;
		$input1 = array();
		$list1 = $this->scale_model->get_list($input1);
		$this->data['list1']=$list1;
		$this->data['template'] ='site/dangki/nhatuyendung';
		$this->load->view('site/main',$this->data);
	}
	function nguoitimviec(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		if($this->input->post()){
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email_jobseeker');
			$this->form_validation->set_rules('password','Password','required|min_length[8]');
			$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');		
			$this->form_validation->set_rules('name','Họ tên','required|min_length[10]');
			$this->form_validation->set_rules('stel','Số điện thoại','required|numeric|min_length[10]|max_length[12]');
			if($this->form_validation->run()){
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$name = $this->input->post('name');
				$stel = $this->input->post('stel');
				$timenow = standard_date('DATE_ATOM', time());
				$data = array(
					'sEmail'=>$email,
					'sPass'=> $password,
					'sUserName'=>$name,
					'sPhone'=>$stel,
					'dDatePosted'=>$timenow,
				);
				if($this->jobseeker_model->create($data)){
					$this->session->set_flashdata('message','Đăng kí  thành công');
				} else{
					$this->session->set_flashdata('message','Đăng kí thất bại');
				}
				redirect(base_url('dangki'));
			}
		}
		$this->data['template'] ='site/dangki/nguoitimviec';
		$this->load->view('site/main',$this->data);
	}
}