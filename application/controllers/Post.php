<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Post extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('post_model');
		$this->load->model('admin_model');
		$this->load->model('category_model');
		$this->load->model('comment_model');
		$this->load->model('reply_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		// $this->load->library('form_validation');
		// $this->load->helper('form');
	
		$this->data['template'] ='site/post/index';
		$this->load->view('site/main',$this->data);
	}
	function read(){
		$id = $this->uri->rsegment('3');
		$info = $this->post_model->get_info($id);
		$this->data['info']=$info;
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại thông tin này');
			redirect(base_url('post/error'));
		}
		$info_name = $this->admin_model->get_info($info->iUser_ID);
		$this->data['info_name']=$info_name;

		$input = array();
		$list = $this->post_model->get_list($input);
		$this->data['list'] = $list;
		///lấy danh mục categry
		$input_category= array();
		$list_category = $this->category_model->get_list($input_category);
		$this->data['list_category'] = $list_category;
		///
		///lấy số lượng bài viết của từng danh mục
		$input_total = array();
		foreach ($list_category as $value) {
			$input_total['where'] = array('iNewsCatID'=>$value->id);
			$total[] = $this->post_model->get_total($input_total);
		}
		
		$this->data['total']=$total;
		//thêm số lượng view bài viết
		$this->post_model->update($id,array('iViewHits'=>$info->iViewHits+1));
		///lay danh sach cmment
		$input_comment  = array();
		$input_comment['where'] = array('iPost_ID'=>$id,'iCuren'=>1);
		$list_comment = $this->comment_model->get_list($input_comment);
		$this->data['list_comment'] = $list_comment;
		foreach ($list_comment as $value) {
			$info_reply[] = $this->reply_model->get_info_rule(array('iCommentID'=>$value->id));
		}
		if(!empty($info_reply)){
			$this->data['info_reply'] = $info_reply;
		}
		
		//lay tong so comment
		$total_comment = $this->comment_model->get_total($input_comment);
		$this->data['total_comment']=$total_comment;
		///lay danh sach trả lời comment
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post()){
			$this->form_validation->set_rules('name','Họ và tên','required|min_length[8]');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('url','Url','required');
			$this->form_validation->set_rules('message','Message','required|min_length[8]');

			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$url = $this->input->post('url');
				$message = $this->input->post('message');
				$timenow = standard_date('DATE_ATOM', time());
				$data = array(
					'sUserName'=>$name,
					'sEmail'=> $email,
					'sUrl'=>$url,
					'sMessage'=>$message,
					'iPost_ID'=>$id,
					'dDatepost'=>$timenow,
					'iStatus'	=>0,
					);
				if($this->comment_model->create($data)){
					$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
				} else{
					$this->session->set_flashdata('message','Không thành công');
				}
				redirect(base_url('post/read/'.$id));
			}
		}
		$this->data['template'] ='site/post/index';
		$this->load->view('site/main',$this->data);
	}

	function category(){
		$id = $this->uri->rsegment('3');
		//$info = $this->post_model->get_info($id);
		$info = $this->category_model->get_info($id);
		$this->data['info']=$info;
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại danh mục');
			redirect(base_url('post/error'));
		}
	//	$info_name = $this->admin_model->get_info($info->iUser_ID);
	//	$this->data['info_name']=$info_name;
		//lấy danh sách bài viết theo category
		
		//lay danh sách category
		$input_category= array();
		$list_category = $this->category_model->get_list($input_category);
		$this->data['list_category'] = $list_category;
		////phana trang trong catrgory
		$in = array();
		$in['where'] = array('iNewsCatID'=>$id); 
		$total_rows = $this->post_model->get_total($in);
		$this->data['total_rows'] = $total_rows;
		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = base_url('/post/category/'.$id);
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
		$input['where'] = array('iNewsCatID'=>$id);
		$list = $this->post_model->get_list($input);
		

		$this->data['list'] = $list;
		///danh sach user
		foreach ($list as $value) {
			$info_admin[] = $this->admin_model->get_info($value->iUser_ID);
		}
		if(!empty($info_admin)){
			$this->data['info_admin']=$info_admin;
		}
		///lay so lượng comment
		foreach ($list as $value) {
			$total_comment[] = $this->comment_model->get_total(array('iPost_ID'=>$value->id,'iCuren'=>1));
		}
		if(!empty($total_comment)){
			$this->data['total_comment']=$total_comment;
		}
		
		////
		$input_total = array();
		foreach ($list_category as $value) {
			$input_total['where'] = array('iNewsCatID'=>$value->id);
			$total[] = $this->post_model->get_total($input_total);
		}
		$this->data['total']=$total;

		$this->data['template'] ='site/post/category';
		$this->load->view('site/main',$this->data);
	}
	function search(){
		$key = $this->input->get('search');
		$this->data['key'] = trim($key);
		$input = array();
		$input['like'] = array('sNewsTitle',$key);
		$list = $this->post_model->get_list($input);
		$this->data['list'] = $list;
		///lay danh sach admin dang bai
		$this->data['list'] = $list;
		///danh sach user
		foreach ($list as $value) {
			$info_admin[] = $this->admin_model->get_info($value->iUser_ID);
		}
		if(!empty($info_admin)){
			$this->data['info_admin']=$info_admin;
		}
		
		//lay danh sách category
		$input_category= array();
		$list_category = $this->category_model->get_list($input_category);
		$this->data['list_category'] = $list_category;
		$input_total = array();
		foreach ($list_category as $value) {
			$input_total['where'] = array('iNewsCatID'=>$value->id);
			$total[] = $this->post_model->get_total($input_total);
		}
		$this->data['total']=$total;

	

		$this->data['template'] ='site/post/search';
		$this->load->view('site/main',$this->data);
	}
	function error(){
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='site/error';
		$this->load->view('site/main',$this->data);
	}
}