<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class User_employer extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('employer_model');
		$this->load->model('city_model');
		$this->load->model('scale_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	// function index(){
	// 	$input = array();
	// 	$list = $this->employer_model->get_list($input);
	// 	$this->data['list']=$list;
	// 	$total = $this->employer_model->get_total();
	// 	$this->data['total']=$total;
	// 	$message = $this->session->flashdata('message');
	// 	$this->data['message'] = $message;
	// 	$this->data['template'] ='admin/employer/index';
	// 	$this->load->view('admin/main',$this->data);
	// }
	
	// function view(){
	// 	$input = array();
	// 	$list = $this->employer_model->get_list($input);
	// 	$this->data['list']=$list;
	// 	$total = $this->employer_model->get_total();
	// 	$this->data['total']=$total;
	// 	$message = $this->session->flashdata('message');
	// 	$this->data['message'] = $message;
	// 	$this->data['template'] ='admin/employer/view';
	// 	$this->load->view('admin/main',$this->data);
	// }

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
		$input1 = array();
		$list1 = $this->scale_model->get_list($input1);
		$this->data['list1']=$list1;

		$login_employer = $this->session->userdata('user_login');
		$this->data['user_login'] = $login_employer ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_employer){
			$this->load->model('employer_model');
			$employer_info = $this->employer_model->get_info($login_employer);
			$this->data['employer_info'] = $employer_info;
		}
		$info = $this->city_model->get_info($employer_info->iCityID);
		$this->data['info'] = $info;
		$info2 = $this->scale_model->get_info($employer_info->iScale);
		$this->data['info2'] = $info2;


			if($this->input->post()){
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$pass = $this->input->post('password');
			if($pass){
				$this->form_validation->set_rules('password','Password','required|min_length[8]');
				$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');		
			}

			$this->form_validation->set_rules('scomname','Tên công ty','required');

			$this->form_validation->set_rules('saddress','Địa chỉ','required');
			$this->form_validation->set_rules('stel','Số điện thoại','required|numeric|min_length[10]|max_length[12]');
			// $this->form_validation->set_rules('scity','Tên thành phố','required');

			// $this->form_validation->set_rules('sscale','Quy mô','required');
			$this->form_validation->set_rules('sprofile','Sơ lược về công ty','required');

			$this->form_validation->set_rules('sfax','Fax','required');
			$this->form_validation->set_rules('scontactname','Thông tin người liên hệ','required');
			$this->form_validation->set_rules('semailcontact','Email','required');
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
				$this->load->library('upload_library');
				$upload_path = './uploads/employer';
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
					
					'sUpdate' => $date_register,
				);
				if($pass){
					$data['sPass'] = $pass;	
				}
				if($image_link){
					$data['sLogo'] = $image_link;
				}
				
				if($this->employer_model->update($employer_info->id,$data)){
					$this->session->set_flashdata('message','Sửa dữ liệu thành công');
				} else{
					$this->session->set_flashdata('message','Không thành công');
				}
				redirect(nhatuyendung_url('user_employer/edit'));
			}
		}
		$this->data['template'] ='nhatuyendung/user_employer/edit';
		$this->load->view('nhatuyendung/main',$this->data);
	}

	function logout(){
		if($this->session->userdata('user_login')){
			$this->session->unset_userdata('user_login');
		}
		redirect(nhatuyendung_url('user_login'));
	}
}