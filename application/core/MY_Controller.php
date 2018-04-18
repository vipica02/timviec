<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**l
* 
*/
class MY_Controller extends CI_Controller {
	//gui  du lieu sang view
	public $data = array();
	function __construct()
	{
		//ke thua tu CI_controller
		parent::__construct();
		
		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin':
			{	
				$this->load->helper('admin');
				$this->_check_login();
				$login = $this->session->userdata('login');
				$this->data['login'] = $login ;
				//neu ton tai login thi lay thong tin các thanh vien
				if($login){
					$this->load->model('admin_model');
					$admin_info = $this->admin_model->get_info($login);
					$this->data['admin_info'] = $admin_info;
					/////
					$this->load->model('employer_model');
					$input = array();
					$input['where'] = array('iUnsubscribe'=>1);
					$total_empoyer = $this->employer_model->get_total($input);
					$this->data['total_empoyer']=$total_empoyer;
					////
					$this->load->model('comment_model');
					///lấy tổng số comment chưa đọc
					$input_comment = array();
					$input_comment['where'] = array('iStatus'=>0);
					$total_comment = $this->comment_model->get_total($input_comment);
					$this->data['total_comment'] = $total_comment;
					

				}

				break;
			}
			
			case 'nhatuyendung':
			{	
				$this->load->helper('nhatuyendung');
				$this->_check_user_login();
				$login_employer = $this->session->userdata('user_login');
				$this->data['user_login'] = $login_employer ;
				//neu ton tai login thi lay thong tin các thanh vien
				if($login_employer){
					//tim id nhaf tuyen dung
					$this->load->model('employer_model');
					$employer_info = $this->employer_model->get_info($login_employer);
					$this->data['employer_info'] = $employer_info;
					/// lay dánh sách đăng tin của nhà tuyển dụng đó
					$this->load->model('saveresume_model');
					$input_ll['where'] = array('iEmploy_ID'=>$employer_info->id,'iStatus'=>1);
					$list_ll = $this->saveresume_model->get_list($input_ll);
					$this->data['list_ll'] = $list_ll;
					///lấy tổng số	
					if($list_ll){
						$total_head = $this->saveresume_model->get_total($input_ll);
						$this->data['total_head'] = $total_head;

					///danh sách 
						$this->load->model('jobseeker_model');
						foreach ($list_ll as  $value) {
							$info_jobsee[] = $this->jobseeker_model->get_info($value->iJob_ID);
						}

						$this->data['info_jobsee'] = $info_jobsee;
					/// danh sach ho so
						$this->load->model('trustworthy_model');
						foreach ($list_ll as  $value) {
							$info_job[] = $this->trustworthy_model->get_info($value->iEmployerID);
						}
						$this->data['info_job'] = $info_job;
					}

				}
				break;
			}

			case 'nguoitimviec':
			{	
				$this->load->helper('nguoitimviec');
				$this->_check_user2_login();
				$login_job = $this->session->userdata('user2_login');
				$this->data['user2_login'] = $login_job ;
				//neu ton tai login thi lay thong tin các thanh vien
				if($login_job){
					$this->load->model('jobseeker_model');
					$jobseeker_info = $this->jobseeker_model->get_info($login_job);
					$this->data['jobseeker_info'] = $jobseeker_info;
					$this->load->model('saveresume_model');
					$input_ll['where'] = array('iJob_ID'=>$jobseeker_info->id,'iResumeID'=>1);
					$list_ll = $this->saveresume_model->get_list($input_ll);
					$this->data['list_ll'] = $list_ll;
					///lấy tổng số	

					if(!empty($list_ll)){
						$total_head = $this->saveresume_model->get_total($input_ll);
						$this->data['total_head'] = $total_head;

					///danh sách 
						$this->load->model('jobseeker_model');
						foreach ($list_ll as  $value) {
							$info[] = $this->jobseeker_model->get_info($value->iJob_ID);
						}

						$this->data['info'] = $info;
					/// danh sach ho so
						$this->load->model('employer_model');
						foreach ($list_ll as  $value) {
							$info_job_list[] = $this->employer_model->get_info($value->iEmploy_ID);
						}
						if(!empty($info_job_list)){
							$this->data['info_job_list'] = $info_job_list;
						}
						
					}
				}
				
				break;
			}
			
			default:
			{
				//	$this->load->helper('home');
				///ton tại login nha tuyen dung
				$login_employer = $this->session->userdata('user_login');
				$this->data['user_login'] = $login_employer ;
				//neu ton tai login thi lay thong tin các thanh vien
				if($login_employer){
					$this->load->model('employer_model');
					$employer_info = $this->employer_model->get_info($login_employer);
					$this->data['employer_info'] = $employer_info;
				}
				///ton tai login nguoi tim viec
				$login_job = $this->session->userdata('user2_login');
				$this->data['user2_login'] = $login_job ;
				if($login_job){
					$this->load->model('jobseeker_model');
					$jobseeker_info = $this->jobseeker_model->get_info($login_job);
					$this->data['jobseeker_info'] = $jobseeker_info;
				}
				///cong viec
				$this->load->model('career_model');
				$input_career = array();
				$list_career = $this->career_model->get_list($input_career);
				$this->data['list_career']=$list_career;
				////thanh pho
				$this->load->model('city_model');
				$input_city = array();
				$list_city = $this->city_model->get_list($input_city);
				$this->data['list_city']=$list_city;
				///lấy danh sách menu danh mục
				$this->load->model('category_model');
				$input_category= array();
				//$input_category['where'] = array('');
				$list_category = $this->category_model->get_list($input_category);
				$this->data['list_category'] = $list_category;
				//xu ly du lieu trang ngoai
				break;
			}
				
		}
	}
	private function _check_login(){
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);
		$login = $this->session->userdata('login');
		//nếu mà chưa đăng nhập mà truy cập controller khác login thì nó sẽ về login
		if(!$login  && $controller!= 'login'){
			redirect(admin_url('login'));
		}
		if($login && $controller == 'login' ){
			redirect(admin_url('home'));
		}
	}
	private function _check_user_login(){
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);
		$login = $this->session->userdata('user_login');
		//nếu mà chưa đăng nhập mà truy cập controller khác login thì nó sẽ về login
		if(!$login  && $controller!= 'user_login'){
			redirect(nhatuyendung_url('user_login'));
		}
		if($login && $controller == 'user_login' ){
			redirect(nhatuyendung_url('home'));
		}
	}
	//kiemtra login nguoi tim viec
	private function _check_user2_login(){
		//$id = $this->uri->rsegment('3');
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);
		$login = $this->session->userdata('user2_login');
		//nếu mà chưa đăng nhập mà truy cập controller khác login thì nó sẽ về login
		if(!$login  && $controller!= 'user2_login'){
			redirect(nguoitimviec_url('user2_login'));
		}
		if($login && $controller == 'user2_login' ){
			redirect(nguoitimviec_url('home'));
		}
		// if($id && $login && $controller == 'user2_login' ){
		// 	redirect(nguoitimviec_url('user_jobseeker/submit/'.$id));
		// }
	}
}