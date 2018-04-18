<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Slider extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('slider_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$input = array();
		$list = $this->slider_model->get_list($input);
		$this->data['list']=$list;
		$total = $this->slider_model->get_total();
		$this->data['total']=$total;
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='admin/slider/index';
		$this->load->view('admin/main',$this->data);
	}
	//them moi quan tri vien
	function add(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		//neu ma co du lieu post len thi kiem tra
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề','required');
			$this->form_validation->set_rules('conten','Mô tả','required');
			$this->form_validation->set_rules('link','link','required');
		}
		if($this->form_validation->run()){
			$title = $this->input->post('title');
			$conten = $this->input->post('conten');
			$link = $this->input->post('link');
			$this->load->library('upload_library');
			$upload_path = './uploads/user/slider';
			$upload_data = $this->upload_library->upload($upload_path,'image');
			$upload_data2 = $this->upload_library->upload($upload_path,'image_list');
			$image_link ='';
			$image_link2 ='';
			if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
			}
			if(isset($upload_data2['file_name'])){
			 	$image_link2 = $upload_data2['file_name'];
			}
			
			$data = array(
				'sContenName'=> $conten,
				'stitle'=>$title,
				'sBackgroud'=>$image_link,
				'sImage'=>$image_link2,
				'sLink'=>$link,
				);
			if($this->slider_model->create($data)){
				$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(admin_url('slider/add'));
		}
		$this->data['template'] ='admin/slider/add';
		$this->load->view('admin/main',$this->data);

	}
	function edit(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$id = $this->uri->rsegment('3');
		$info = $this->slider_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại tiêu đề này');
			redirect(admin_url('slider'));
		}
		$this->data['info']=$info;
		//neu ma co du lieu post len thi kiem tra
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề','required');
			$this->form_validation->set_rules('conten','Mô tả','required');
			$this->form_validation->set_rules('link','link','required');
		}
		if($this->form_validation->run()){
			$title = $this->input->post('title');
			$conten = $this->input->post('conten');
			$link = $this->input->post('link');
			$timenow = standard_date('DATE_ATOM', time());
			$this->load->library('upload_library');
			$upload_path = './uploads/user/slider';
			$upload_data = $this->upload_library->upload($upload_path,'image');
			$upload_data2 = $this->upload_library->upload($upload_path,'image_list');
			// $image_link ='';
			// $image_link2 ='';
			if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
			}
			if($image_link !=''){
       		 		$image_link = $upload_data['file_name'];
       		 	}
			if(isset($upload_data2['file_name'])){
			 	$image_link2 = $upload_data2['file_name'];
			}
			if($image_link2 !=''){
       		 		$image_link2 = $upload_data2['file_name'];
       		 	}
			$data = array(
				'sContenName'=> $conten,
				'stitle'=>$title,
				'sLink'=>$link,
				'sUpdate'=>$timenow,
				);
			if($image_link2){
				$data['sImage'] = $image_link2;
			}
			if($image_link){
				$data['sBackgroud'] = $image_link;
			}
			if($this->slider_model->update($id,$data)){
				$this->session->set_flashdata('message','Sửa dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(admin_url('slider'));
		}
		$this->data['template'] ='admin/slider/edit';
		$this->load->view('admin/main',$this->data);
	}
	function delete(){
		$id = $this->uri->rsegment('3');
		$info = $this->slider_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(admin_url('slider'));
		}
		$this->slider_model->delete($id);
		$image_link = './uploads/user/slider/'.$info->sImage;
		$image_link2 = './uploads/user/slider/'.$info->sBackgroud;
		if(file_exists($image_link) && file_exists($image_link2)){
			unlink($image_link);
			unlink($image_link2);

		}
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
			redirect(admin_url('slider'));
	}
	
}