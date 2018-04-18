<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Career extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('career_model');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$input = array();
		$list = $this->career_model->get_list($input);
		$this->data['list']=$list;
		$total = $this->career_model->get_total();
		$this->data['total']=$total;
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post()){
			$this->form_validation->set_rules('name','Quy mô','required');
			$this->form_validation->set_rules('icon','Icon','required');
			$this->form_validation->set_rules('conten','Mô tả','required');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$icon = $this->input->post('icon');
				$conten = $this->input->post('conten');
				$data = array(
					'sCareerName'=>$name,
					'sIcon' =>$icon,
					'sConten'=>$conten,
					'slug' =>url_title($name),
				);
				if($this->career_model->create($data)){
					$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
				} else{
					$this->session->set_flashdata('message','Không thành công');
				}
				redirect(admin_url('career'));
			}

		}
		$this->data['template'] ='admin/career/index';
		$this->load->view('admin/main',$this->data);
	}
	function delete(){
		$id = $this->uri->rsegment('3');
		$info = $this->career_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(admin_url('scale'));
		}
		$this->scale_model->delete($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
			redirect(admin_url('career'));
	}

	function edit(){
		$input = array();
		$list = $this->career_model->get_list($input);
		$this->data['list']=$list;
		$this->load->library('form_validation');
		$this->load->helper('form');
		$id = $this->uri->rsegment('3');
		$info = $this->career_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quy mô');
			redirect(admin_url('career'));
		}
		$this->data['info']= $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Quy mô','required');
			$this->form_validation->set_rules('icon','Icon','required');
			$this->form_validation->set_rules('conten','Mô tả','required');
		}
		if($this->form_validation->run()){
				$name = $this->input->post('name');
				$icon = $this->input->post('icon');
				$conten = $this->input->post('conten');
				$timenow = standard_date('DATE_ATOM', time());
				 
				$data = array(
					'sCareerName'=>$name,
					'sIcon' =>$icon,
					'sConten'=>$conten,
					'slug' =>url_title($name),
					'sUpdate'=>$timenow
				);
				//neu thay doi mk thi ta gan mat khau
				
				if($this->career_model->update($id,$data)){
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công ');
				} else{
					$this->session->set_flashdata('message','Không cập nhật được');
				}
				redirect(admin_url('career'));
		}
		$this->data['template'] ='admin/career/index';
		$this->load->view('admin/main',$this->data);
	}
}