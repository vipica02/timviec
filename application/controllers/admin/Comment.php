<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Comment extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('comment_model');
		$this->load->model('reply_model');
		$this->load->model('post_model');
		$this->load->model('admin_model');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		// $this->$data['tem'] = 'City';
		$input = array();
		$list = $this->comment_model->get_list($input);
		$this->data['list']=$list;
		if($list){
			foreach ($list as $value) {
		//	$input['where'] = array('iNewsCatID' => $value->id);
				$info[] = $this->post_model->get_info($value->iPost_ID);
			}
			$this->data['info']=$info;

		//lay sanh sach nguoi trl comment
			foreach ($list as $value) {
				$info_reply[] = $this->reply_model->get_info_rule(array('iCommentID'=>$value->id));
			}
			if(!empty($info_reply)){
				$this->data['info_reply']=$info_reply;

			}
		//	var_dump($info_reply);
			foreach ($info_reply as $value) {
				if($value){
					$info_admin[] = $this->admin_model->get_info($value->iAdminID);	
				}

			}
			//var_dump($info_admin);
			if(!empty($info_admin)){
				$this->data['info_admin']=$info_admin;
			}
			

		}
		
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='admin/comment/index';
		$this->load->view('admin/main',$this->data);
	}
	function delete(){
		$id = $this->uri->rsegment('3');
		$info = $this->comment_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(admin_url('comment'));
		}
		$this->comment_model->delete($id);
		$this->reply_model->del_rule(array('iCommentID'=>$info->id));
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
			redirect(admin_url('comment'));
	}

	function reply(){
		///lây thong tin form
		$this->load->library('form_validation');
		$this->load->helper('form');
		///lấy id
		$id = $this->uri->rsegment('3');
		//cập nhật đã đọc
		$data = array('iStatus'=>1);
		$this->comment_model->update($id,$data);
		$info = $this->comment_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại comment');
			redirect(admin_url('comment'));
		}
		$this->data['info']= $info;

		///ten admin

		$login = $this->session->userdata('login');
		$this->data['login'] = $login ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login){
			$this->load->model('admin_model');
			$admin_info = $this->admin_model->get_info($login);
			$this->data['admin_info'] = $admin_info;
		}

		if($this->input->post()){
			$comment = $this->input->post('comment');
			if($comment){
				$this->form_validation->set_rules('comment','Comment giữ nguyên hoặc','required');
			}
			$reply = $this->input->post('reply');
			// if($reply){
			$curen = $this->input->post('curen');
			// }
			
		}
		if($this->form_validation->run()){
			$timenow = standard_date('DATE_ATOM', time());
			//$curen = $this->input->post('curen');
			
				$data1 = array(
				'iCuren'=>$curen,
				);
				if($reply){
					$data2 = array(
						'sReply' => $reply,
						'sDatepost' =>$timenow,
						'iAdminID' =>$admin_info->id,
						'iCommentID'=>$id,
						);
					if( $this->reply_model->create($data2) ){
						$this->session->set_flashdata('message','Cập nhật dữ liệu thành công ');
					} else{
						$this->session->set_flashdata('message','Không cập nhật được');
					}
				}
				 $this->comment_model->update($id,$data1);
			
			redirect(admin_url('comment'));
		}
		$this->data['template'] ='admin/comment/edit';
		$this->load->view('admin/main',$this->data);
	}
}