<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Home extends MY_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('employer_model');
		$this->load->model('comment_model');
		$this->load->model('post_model');
		$this->load->model('jobseeker_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	function index(){
		$input = array();
		$list = $this->employer_model->get_list($input);
		$this->data['list']=$list;
		// $input = array();
		// $input['where'] = array('iUnsubscribe'=>1);
		// $total_empoyer = $this->employer_model->get_total($input);
		// $this->data['total_empoyer']=$total_empoyer;
		//lấy tổng số comment
		$total_comment = $this->comment_model->get_total();
		$this->data['total_comment'] = $total_comment;
		///lấy tông số lượt xem bai viết
		$total_view = $this->post_model->get_sum('iViewHits');
		$this->data['total_view'] = $total_view;
		//lay tong so nha tuyen dung
		$total_employer = $this->employer_model->get_total();
		$this->data['total_employer'] = $total_employer;
		///lấy tông số người tìm việc
		$total_jobseeker = $this->jobseeker_model->get_total();
		$this->data['total_jobseeker'] = $total_jobseeker;
		////
		$this->data['template'] = 'admin/home/index';
		$this->load->view('admin/main',$this->data);
	}
}