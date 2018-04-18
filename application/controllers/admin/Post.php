<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Post extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('post_model');
		$this->load->library('upload_library');
		$this->load->model('admin_model');
		$this->load->model('employer_model');
		$this->load->model('category_model');
		//$this->load->library('slug_library');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/
	function index(){
		$input = array();
		$list = $this->post_model->get_list($input);
		$this->data['list']=$list;
		$total = $this->post_model->get_total();
		$this->data['total']=$total;
		////
		foreach ($list as $value) {
		//	$input['where'] = array('iNewsCatID' => $value->id);
			$info[] = $this->admin_model->get_info($value->iUser_ID);
		}
		$this->data['info']=$info;

		// $input = array();
		// $input['where'] = array('iUnsubscribe'=>1);
		// $total_empoyer = $this->employer_model->get_total($input);
		// $this->data['total_empoyer']=$total_empoyer;
		///
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='admin/post/index';
		$this->load->view('admin/main',$this->data);
	}

	function add(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		//neu ma co du lieu post len thi kiem tra

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		///
		$input = array();
		$list = $this->category_model->get_list($input);
		$this->data['list'] = $list;
		///
		
		///id user
		$login = $this->session->userdata('login');
				$this->data['login'] = $login ;
				//neu ton tai login thi lay thong tin các thanh vien
				if($login){
					$this->load->model('admin_model');
					$admin_info = $this->admin_model->get_info($login);
					$this->data['admin_info'] = $admin_info;
				}
		$user = $admin_info->id;
		///
		if($this->input->post('them')){
			$this->form_validation->set_rules('title','Tiêu đề','required');
		}
		if($this->form_validation->run()){
			$title = $this->input->post('title');
			$editer1 = $this->input->post('editor');
			$excerpt= $this->input->post('excerpt');
			$danhmuc = $this->input->post('paren');
				//$image = $this->input->post('image');

			$upload_path = './uploads/post';
			$upload_data = $this->upload_library->upload($upload_path,'image');
			$image_link ='';
			if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
			}
			$timenow = standard_date('DATE_ATOM', time());
			$data = array(
				'sNewsTitle'=> $title,
				'sContent'=> $editer1,
				'sDescription' => $excerpt,
				'sPicture' => $image_link,
				'sLink' => url_title($title),
				'dDatePosted' => $timenow,
				'iNewsCatID' =>$danhmuc,
				'iUser_ID'	=>$user,
				);
			if($this->post_model->create($data)){
				$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(admin_url('post/add'));
		}

		if($this->input->post('category_add')){
			$this->form_validation->set_rules('category','Tên danh mục','required');
		}
			if($this->form_validation->run()){
				$category = $this->input->post('category');
				$data = array(
					'sNewsCategory' => $category,
					);
				if($this->category_model->create($data)){
					$this->session->set_flashdata('message','Thêm mới danh mục thành công');
				} else{
					$this->session->set_flashdata('message','Không thành công');
				}
				redirect(admin_url('post/add'));
		}
		$this->data['template'] ='admin/post/add';
		$this->load->view('admin/main',$this->data);

	}

	function edit(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$id = $this->uri->rsegment('3');
		$info = $this->post_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(admin_url('post'));
		}
		$this->data['info']=$info;
		///tên danh muc
		$info_category = $this->category_model->get_info($info->iNewsCatID);
		$this->data['info_category']=$info_category;
		///danh mục category
		$input = array();
		$list = $this->category_model->get_list($input);
		$this->data['list'] = $list;
		if($this->input->post('sua')){
			$this->form_validation->set_rules('title','Tiêu đề','required');
		}

		if($this->form_validation->run()){
			$title = $this->input->post('title');
			$editer1 = $this->input->post('editor');
			$excerpt= $this->input->post('excerpt');
			$danhmuc = $this->input->post('paren');
			$upload_path = './uploads/post';
			$upload_data = $this->upload_library->upload($upload_path,'image');
			$image_link ='';
			if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
			}
			if($image_link !=''){
				$image_link = $upload_data['file_name'];
			}
			$timenow = standard_date('DATE_ATOM', time());
			$data = array(
				'sNewsTitle'=> $title,
				'sContent'=> $editer1,
				'sDescription'=>$excerpt,
				//'sPicture'=>$image_link,
				'sLink'=>	url_title($title),
				'sUpdate' => $timenow,
				'iNewsCatID' =>$danhmuc,
				);
			if($image_link){
					$data['sPicture'] = $image_link;	
				}
			if($this->post_model->update($id,$data)){
				$this->session->set_flashdata('message','Sửa dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(admin_url('post'));
		}

		if($this->input->post('category_add')){
			$this->form_validation->set_rules('category','Tên danh mục','required');
		}
			if($this->form_validation->run()){
				$category = $this->input->post('category');
				$data = array(
					'sNewsCategory' => $category,
					);
				if($this->category_model->create($data)){
					$this->session->set_flashdata('message','Thêm mới danh mục thành công');
				} else{
					$this->session->set_flashdata('message','Không thành công');
				}
				redirect(admin_url('post/add'));
		}
		$this->data['template'] ='admin/post/edit';
		$this->load->view('admin/main',$this->data);
	}

	function delete(){
		$id = $this->uri->rsegment('3');
		$info = $this->post_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(admin_url('post'));
		}
		$this->post_model->delete($id);
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
			redirect(admin_url('post'));
	}
	//check usernam
	
}