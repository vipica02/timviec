<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Category  extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('post_model');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$input = array();
		$list = $this->category_model->get_list($input);
		$this->data['list'] = $list;
		// $total_1 = $this->category_model->get_total($input);
		// $this->data['total_1'] = $total_1;
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiền lương','required');

		}
		foreach ($list as $value) {
			$input['where'] = array('iNewsCatID' => $value->id);
			$total[] = $this->post_model->get_total($input);

		}
		
		$this->data['total'] = $total;
	//	echo $total;
		//print_r($total);
		if($this->form_validation->run()){
			$name = $this->input->post('name');
			$cate  =  $this->input->post('paren');
			$conten  =  $this->input->post('conten');
			$data = array(
				'sNewsCategory' =>$name,
				'sCaption' => $conten,
				'iParentID' =>$cate,
				);
			if($this->category_model->create($data)){
				$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(admin_url('category'));
		}
		$this->data['template'] = 'admin/category/index';
		$this->load->view('admin/main',$this->data);
	}
	// function tong($value){
	// 	$input['where'] = array('iNewsCatID'=>$value);
	// 	$total_2 = $this->post_model->get_total($input);
	// 	$this->data['total_2'] = $total_2;
	// //	return $total_2;
	// }

	function delete(){
		$id = $this->uri->rsegment('3');
		$info = $this->category_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(admin_url('category'));
		}
		$this->category_model->delete($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
			redirect(admin_url('category'));
	}

	function edit(){
		$input = array();
		$list = $this->category_model->get_list($input);
		$this->data['list']=$list;
		$this->load->library('form_validation');
		$this->load->helper('form');
		$id = $this->uri->rsegment('3');
		$info = $this->category_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại danh mục');
			redirect(admin_url('category'));
		}
		$this->data['info'] = $info;
		$info2 = $this->category_model->get_info($info->iParentID);
		$this->data['info2'] = $info2;

		foreach ($list as $value) {
			$input['where'] = array('iNewsCatID' => $value->id);
			$total[] = $this->post_model->get_total($input);

		}
		
		$this->data['total'] = $total;

		if($this->input->post()){
			$this->form_validation->set_rules('name','Danh mục','required');	
		}
		if($this->form_validation->run()){
				$name = $this->input->post('name');
				$paren  = $this->input->post('paren');
				$conten  = $this->input->post('conten');
				 
				$data = array(
					'sNewsCategory' =>$name,
					'iParentID' =>$paren,
					'sCaption' =>$conten,
					//'sUpdate'=>$timenow
				);
				//neu thay doi mk thi ta gan mat khau
				
				if($this->category_model->update($id,$data)){
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công ');
				} else{
					$this->session->set_flashdata('message','Không cập nhật được');
				}
				redirect(admin_url('category'));
		}
		$this->data['template'] = 'admin/category/index';
		$this->load->view('admin/main',$this->data);
	}
}