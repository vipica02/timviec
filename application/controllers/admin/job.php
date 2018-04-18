<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class job extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('jobseeker_model');
		$this->load->model('city_model');
		$this->load->model('trustworthy_model');
			$this->load->model('scale_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$input = array();
		$input['where'] = array();
		$list = $this->jobseeker_model->get_list($input);
		$this->data['list']=$list;
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='admin/job/index';
		$this->load->view('admin/main',$this->data);
	}
	
	function view(){
		$total_rows = $this->employer_model->get_total();
		$this->data['total_rows'] = $total_rows;
		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = admin_url('employer/view');
		$config['per_page']  = 5;
		$config['uri_segment']	 =  4;
		$config['next_link'] =  'Next »';
		$config['prev_link'] =  '« Prev';
		//khoi tao phan trang
		$this->pagination->initialize($config); 
		$sement = $this->uri->segment(4);
		$sement = intval($sement);
		$input = array();
		$input['limit'] = array($config['per_page'],$sement);

		$input['where'] = array('iUnsubscribe'=>0);
		$list = $this->employer_model->get_list($input);
		$this->data['list']=$list;
		$total = $this->employer_model->get_total();
		$this->data['total']=$total;
		//
		
		// $in['where'] = array('iEmployerID'=>67);
		// $total_strustworthy = $this->trustworthy_model->get_total($in);
		// $this->data['total_strustworthy']=$total_strustworthy;

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='admin/employer/view';
		$this->load->view('admin/main',$this->data);
	}

	function check_email(){
		$email = $this->input->post('email');
		$where  = array('sEmail'=> $email );
		if($this->employer_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,'Email này đã tồn tại');
			return false;
		}
		return true;
	}
	
	function add(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->load->library('form_validation');
		$this->load->helper('form');
		$input = array();
		$list = $this->city_model->get_list($input);
		$this->data['list']=$list;

		if($this->input->post()){
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]');
			$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');		
			$this->form_validation->set_rules('name','Họ và tên','required');
			$this->form_validation->set_rules('adress','Địa chỉ','required');
			$stel = $this->input->post('stel');
			$this->form_validation->set_rules('stel','Số điện thoại','required|numeric|min_length[10]|max_length[12]');
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
					'sPass'=>$password,
					'sPhone'=>$stel,
					'sEmail'=>$email,
				);
				
				if($image_link){
					$data['sImage'] = $image_link;
				}
				
				if($this->jobseeker_model->create($data)){
					$this->session->set_flashdata('message','Thêm dữ liệu thành công');
				} else{
					$this->session->set_flashdata('message','Không thành công');
				}
				redirect(admin_url('job'));
			}
		}
		$this->data['template'] ='admin/job/add';
		$this->load->view('admin/main',$this->data);
	}

	function edit(){
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->load->library('form_validation');
		$this->load->helper('form');
		$input = array();
		$list = $this->city_model->get_list($input);
		$this->data['list']=$list;
		$id = $this->uri->rsegment('3');
		$info = $this->jobseeker_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại công ty này');
			redirect(admin_url('job'));
		}
		$this->data['info']=$info;
		//$jobseeker_info =  $this->city_model->get_info($info->iCityID);
		$jobseeker_info = $this->city_model->get_info($info->iCityID);
		$this->data['jobseeker_info'] = $jobseeker_info;
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
				
				
				if($this->jobseeker_model->update($id,$data)){
					$this->session->set_flashdata('message','Sửa dữ liệu thành công');
				} else{
					$this->session->set_flashdata('message','Không thành công');
				}
				redirect(admin_url('job'));
			}
		}
		$this->data['template'] ='admin/job/edit';
		$this->load->view('admin/main',$this->data);
	}

	// function edit_view(){
		
	// 	$this->load->library('form_validation');
	// 	$this->load->helper('form');
	// 	$input = array();
	// 	$list = $this->city_model->get_list($input);
	// 	$this->data['list']=$list;
	// 	$input1 = array();
	// 	$list1 = $this->scale_model->get_list($input1);
	// 	$this->data['list1']=$list1;
	// 	$id = $this->uri->rsegment('3');
	// 	$info = $this->employer_model->get_info($id);
	// 	if(!$info){
	// 		$this->session->set_flashdata('message','không tồn tại công ty này');
	// 		redirect(admin_url('employer/view'));
	// 	}
	// 	$this->data['info']=$info;

	// 		if($this->input->post()){
	// 		$this->form_validation->set_rules('email','Email','required|valid_email');
	// 		$pass = $this->input->post('password');
	// 		if($pass){
	// 			$this->form_validation->set_rules('password','Password','required|min_length[8]');
	// 			$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');		
	// 		}

	// 		$this->form_validation->set_rules('scomname','Tên công ty','required');

	// 		$this->form_validation->set_rules('saddress','Địa chỉ','required');
	// 		$this->form_validation->set_rules('stel','Số điện thoại','required|numeric|min_length[10]|max_length[12]');
	// 		$this->form_validation->set_rules('scity','Tên thành phố','required');
	// 		$this->form_validation->set_rules('sscale','Quy mô','required');
	// 		$this->form_validation->set_rules('sprofile','Sơ lược về công ty','required');

	// 		$this->form_validation->set_rules('sfax','Fax','required');
	// 		$this->form_validation->set_rules('scontactname','Thông tin người liên hệ','required');
	// 		$this->form_validation->set_rules('semailcontact','Email','required');
	// 		$this->form_validation->set_rules('snumecontact','Số điện thoại người liên hệ','required');
	// 		$this->form_validation->set_rules('statust','Thông tin vip','required');
	// 		if($this->form_validation->run()){
	// 			$email = $this->input->post('email');
	// 			$password = $this->input->post('password');
	// 			$scomname = $this->input->post('scomname');
	// 			$saddress = $this->input->post('saddress');
	// 			$stel = $this->input->post('stel');
	// 			$scity = $this->input->post('scity');
	// 			$sscale = $this->input->post('sscale');
	// 			$sprofile = $this->input->post('sprofile');
	// 			$sfax = $this->input->post('sfax');
	// 			$scontactname = $this->input->post('scontactname');
	// 			$semailcontact = $this->input->post('semailcontact');
	// 			$snumecontact = $this->input->post('snumecontact');
	// 			$statust = $this->input->post('statust');
	// 			$date_register = standard_date('DATE_ATOM', time());
	// 			$data = array(
	// 				'sEmail'=>$email,
	// 				'sPass'=> $password,
	// 				'sComName'=>$scomname,
	// 				'sAddress'=>$saddress,
	// 				'sTel'=>$stel,
	// 				'iCityID'=>$scity,
	// 				'iScale'=>$sscale,
	// 				'sProfile'=>$sprofile,
	// 				'sFax'=>$sfax,
	// 				'sContactName'=>$scontactname,
	// 				'sContactEmail'=>$semailcontact,
	// 				'sMobile'=>$snumecontact,
	// 				'iStatus'=>$statust,
	// 				'sUpdate' => $date_register,
	// 			);
	// 			if($pass){
	// 				$data['sPass'] = $pass;	
	// 			}
	// 			if($this->employer_model->create($data)){
	// 				$this->session->set_flashdata('message','Sửa mới liệu thành công');
	// 			} else{
	// 				$this->session->set_flashdata('message','Không thành công');
	// 			}
	// 			redirect(admin_url('employer/view'));
	// 		}
	// 	}
	// 	$this->data['template'] ='admin/employer/edit';
	// 	$this->load->view('admin/main',$this->data);
	// }

	///xóa
	function delete(){
		$id = $this->uri->rsegment('3');
		$info = $this->jobseeker_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại công ty');
			redirect(admin_url('job'));
		}
		$this->jobseeker_model->delete($id);
		//$input = array('');
		//$this->employer_model->delete($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('job'));
	}

	/*function delete_view(){
		$id = $this->uri->rsegment('3');
		$info = $this->employer_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','Không tồn tại công ty');
			redirect(admin_url('employer/view'));
		}
		$this->employer_model->delete($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		redirect(admin_url('employer/view'));
	}*/
	function download($fileName = NULL) {   
		if ($fileName) {
			   $file = realpath ( "uploads/employer/giayphep" ) . "\\" . $fileName;

    // check file exists    
			if (file_exists ( $file )) {
     // get file content
				$data = file_get_contents ( $file );
     //force download
				force_download ( $fileName, $data );
			} else {
     // Redirect to base url
				redirect(admin_url('employer/view'));
			}
		}else{
			$this->session->set_flashdata('message','Nhà tuyển dụng chưa upload giấy phép kinh doanh');
			redirect(admin_url('employer/view'));	
		}
		
	}
	function detail(){
		
		$id = $this->uri->rsegment('3');
		$info = $this->employer_model->get_info($id);
		$this->data['info']=$info;
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại nhà tuyển dụng này');
			redirect(admin_url('employer/view'));
		}
		$info_city = $this->city_model->get_info($info->iCityID);
		$this->data['info_city']=$info_city;
		$info_cale = $this->scale_model->get_info($info->iScale);
		$this->data['info_cale']=$info_cale;

		$input= array();
		$input['where'] = array('iEmployerID'=>$info->id);
		$total_strustworthy = $this->trustworthy_model->get_total($input);
		$this->data['total_strustworthy']=$total_strustworthy;

		$this->data['template'] ='admin/employer/detail';
		$this->load->view('admin/main',$this->data);
	}
}