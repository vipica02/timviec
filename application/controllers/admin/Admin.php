<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Admin extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$input = array();
		$list = $this->admin_model->get_list($input);
		$this->data['list']=$list;
		$total = $this->admin_model->get_total();
		$this->data['total']=$total;
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='admin/admin/index';
		$this->load->view('admin/main',$this->data);
	}
	//check usernam
	function check_usename(){
		$username =$this->input->post('username');
		$where  = array('sUserName'=> $username );
		if($this->admin_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
			return false;
		}
		return true;
	}
	function check_email(){
		$username =$this->input->post('email');
		$where  = array('sEmail'=> $username );
		if($this->admin_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,'Email này đã tồn tại');
			return false;
		}
		return true;
	}
	//them moi quan tri vien
	function add(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		//neu ma co du lieu post len thi kiem tra
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ và tên','required|min_length[8]');
			$this->form_validation->set_rules('date_birth','Ngày sinh','required');
			$this->form_validation->set_rules('date_do','Ngày vào làm','required');
			$this->form_validation->set_rules('username','Tên tài khoản','required|min_length[6]|callback_check_usename');
			$this->form_validation->set_rules('password','Mật khẩu','required');
			$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email');
			$this->form_validation->set_rules('address','Địa chỉ','required');
		}
		if($this->form_validation->run()){
			$name = $this->input->post('name');
			$date_birth = $this->input->post('date_birth');
			$date_do = $this->input->post('date_do');
			$image = $this->input->post('image');
			$username = $this->input->post('username');
			$address =$this->input->post('address');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$sex = $this->input->post('sex');
			$position = $this->input->post('position');
			$aboutme = $this->input->post('aboutme');
			$this->load->library('upload_library');
			$upload_path = './uploads/user';
			$upload_data = $this->upload_library->upload($upload_path,'image');
			$image_link ='';
			if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
			}
			
			$data = array(
				'Name'=>$name,
				'Doday'=> nice_date($date_do,'y-m-d'),
				'yearbirth'=>nice_date($date_birth,'y-m-d'),
				'sUserName'=>$username,
				'sEmail'=>$email,
				'sPassword'=>$password,
				'iGrade'=>$position,
				'iStatus'=>$sex,
				'image'=>$image_link,
				'Address'=>$address,
				'Aboutme'=>$aboutme
				);
			if($this->admin_model->create($data)){
				$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(admin_url('admin'));
		}
		$this->data['template'] ='admin/admin/add';
		$this->load->view('admin/main',$this->data);

	}
	function edit(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$id = $this->uri->rsegment('3');
		$info = $this->admin_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(admin_url('admin'));
		}
		$this->data['info']=$info;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ và tên','required|min_length[8]');
			$this->form_validation->set_rules('date_birth','Ngày sinh','required');
			$this->form_validation->set_rules('date_do','Ngày vào làm','required');
			$this->form_validation->set_rules('username','Tên tài khoản','required|min_length[6]');
			$pass = $this->input->post('password');
			if($pass){
				$this->form_validation->set_rules('password','Mật khẩu','required');
				$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');					
			}

			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('address','Địa chỉ','required');
		}
		if($this->form_validation->run()){
				$name = $this->input->post('name');
				$date_birth = $this->input->post('date_birth');
				$date_do = $this->input->post('date_do');
				$image = $this->input->post('image');
				$username = $this->input->post('username');
				$address =$this->input->post('address');
				$email = $this->input->post('email');
				$sex = $this->input->post('sex');
				$position = $this->input->post('position');
				$aboutme = $this->input->post('aboutme');
				$timenow = standard_date('DATE_ATOM', time());
				 $this->load->library('upload_library');
				 $upload_path = './uploads/user';
				 $upload_data = $this->upload_library->upload($upload_path,'image');
				 $image_link ='';
				if(isset($upload_data['file_name'])){
				 	$image_link = $upload_data['file_name'];
       		 	}
       		 	if($image_link !=''){
       		 		$image_link = $upload_data['file_name'];
       		 	}
				$data = array(
					'Name'=>$name,
					'yearbirth'=>  nice_date($date_birth,'y-m-d') ,
					'Doday'=>  nice_date($date_do,'y-m-d') ,
					'sUserName'=>$username,
					'sEmail'=>$email,
					// 'sPassword'=>$password,
					'iGrade'=>$position,
					'iStatus'=>$sex,
				
					'Address'=>$address,
					'Aboutme'=>$aboutme,
					'Date_Update'=>$timenow
				);
				//neu thay doi mk thi ta gan mat khau
				if($pass){
					$data['sPassword'] = $pass;	
				}
				if($image_link){
					$data['image'] = $image_link;	
				}
				if($this->admin_model->update($id,$data)){
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công ');
				} else{
					$this->session->set_flashdata('message','Không cập nhật được');
				}
				redirect(admin_url('admin'));
		}
		$this->data['template'] ='admin/admin/edit';
		$this->load->view('admin/main',$this->data);
	}
	function delete(){
		$id = $this->uri->rsegment('3');
		$info = $this->admin_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(admin_url('admin'));
		}
		$this->admin_model->delete($id);
		$image_link = './uploads/user/'.$info->image;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
			redirect(admin_url('admin'));
	}
	
	function delete_check(){
		
		$address = $this->input->post('xoa');
		$info = $this->admin_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(admin_url('admin'));
		}
		if(!empty($address)){
			for ($i=0; $i < count($address) ; $i++) { 
				$this->admin_model->delete($address[$i]);
			}
		}
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
			redirect(admin_url('admin'));	
	}

	function logout(){
		if($this->session->userdata('login')){
			$this->session->unset_userdata('login');
		}
		redirect(admin_url('login'));
	}

	
}