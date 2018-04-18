<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Upload extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		//$this->load->model('employer_model');
	
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/
	
	function index(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		$login_employer = $this->session->userdata('user_login');
		$this->data['user_login'] = $login_employer ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_employer){
			$this->load->model('employer_model');
			$employer_info = $this->employer_model->get_info($login_employer);
			$this->data['employer_info'] = $employer_info;
		}
		if($this->input->post('submit')){
			$this->load->library('upload_library');
			$upload_path = './uploads/employer/giayphep';
			$upload_data = $this->upload_library->upload_file($upload_path,'image');
			//$image_link ='';
			if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
			}
			if(!empty($image_link)){
				$image_link = $upload_data['file_name'];
				$data = array(
					'sLink_Upload' => $image_link,
					);
				if($this->employer_model->update($employer_info->id,$data)){
					$this->session->set_flashdata('message','Bạn đã upload file thành công');
				} else{
					$this->session->set_flashdata('message','Không thành công');
				}
				redirect(nhatuyendung_url('upload'));
			}else{
				$this->session->set_flashdata('message','file không tồn tại');
			}
			
		}

				
		$this->data['template'] ='nhatuyendung/upload_file/index';
		$this->load->view('nhatuyendung/main',$this->data);
	}

}