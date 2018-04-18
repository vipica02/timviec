<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class User_job extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('diploma_model');
		$this->load->model('experience_model');
		$this->load->model('rank_model');
		$this->load->model('career_model');
		$this->load->model('city_model');
		$this->load->model('employer_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$login_job = $this->session->userdata('user2_login');
		$this->data['user2_login'] = $login_job ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_job){
			$this->load->model('jobseeker_model');
			$jobseeker_info = $this->jobseeker_model->get_info($login_job);
			$this->data['jobseeker_info'] = $jobseeker_info;
		}
		$jobID = $jobseeker_info->id;
		$input = array();
		$input['where'] = array('iJobID'=>$jobID);
		$list = $this->job_model->get_list($input);
		$this->data['list']=$list;
		// $total = $this->admin_model->get_total();
		// $this->data['total']=$total;
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='nguoitimviec/hoso/index';
		$this->load->view('nguoitimviec/main',$this->data);
	}
	
	function add(){

		$this->load->library('form_validation');
		$this->load->helper('form');
		///trình độ
		$input_diploma = array();
		$list_diploma = $this->diploma_model->get_list($input_diploma);
		$this->data['list_diploma'] =  $list_diploma;
		///khinh nghiệm
		$input_experience = array();
		$list_experience = $this->experience_model->get_list($input_experience);
		$this->data['list_experience'] =  $list_experience;
		//cấp bậc
		$input_rank = array();
		$list_rank = $this->rank_model->get_list($input_rank);
		$this->data['list_rank'] =  $list_rank;
		///ngành nghề
		$input_career = array();
		$list_career = $this->career_model->get_list($input_career);
		$this->data['list_career'] =  $list_career;
		///tỉnh thành phố
		$input_city= array();
		$list_city = $this->city_model->get_list($input_city);

		$this->data['list_city'] =  $list_city;
		$login_job = $this->session->userdata('user2_login');
				$this->data['user2_login'] = $login_job ;
				//neu ton tai login thi lay thong tin các thanh vien
				if($login_job){
					$this->load->model('jobseeker_model');
					$jobseeker_info = $this->jobseeker_model->get_info($login_job);
					$this->data['jobseeker_info'] = $jobseeker_info;
				}
		$jobID = $jobseeker_info->id;
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề','required|min_length[8]');
			$this->form_validation->set_rules('wage','Mức lương','required');
			$this->form_validation->set_rules('diploma','Trình độ','required');
			$this->form_validation->set_rules('exp','Kinh nghiệm','required');
			$this->form_validation->set_rules('ranks','Cấp bậc','required');
			$this->form_validation->set_rules('career','Ngành nghề','required');
			$this->form_validation->set_rules('city','Thành phố','required');
			$this->form_validation->set_rules('display','Hiển thị tin','required');

		}
		if($this->form_validation->run()){
			$title = $this->input->post('title');
			$wage = $this->input->post('wage');
			$diploma = $this->input->post('diploma');
			$experience = $this->input->post('exp');
			$rank = $this->input->post('rank');
			$career =$this->input->post('career');
			$city = $this->input->post('city');
			$display = $this->input->post('display');
			$time_now = standard_date('DATE_ATOM', time());
			$data = array(
				'sJobTitle'=>$title,
				'sWage'=>$wage,
				'iDiplomaID'=>$diploma,
				'sExperience'=>$experience,
				'iRankID'=>$rank,
				'iCareerID'=>$career,
				'iCityID'=>$city,
				'iDisplay'=>$display,
				'iJobID'=>$jobID,
				'sDatePost'=>$time_now,
				);
			if($this->job_model->create($data)){
				$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(nguoitimviec_url('user_job'));
		}
		$this->data['template'] ='nguoitimviec/hoso/add';
		$this->load->view('nguoitimviec/main',$this->data);

	}

	function add_upload(){

		$this->load->library('form_validation');
		$this->load->helper('form');
		///trình độ
		$input_diploma = array();
		$list_diploma = $this->diploma_model->get_list($input_diploma);
		$this->data['list_diploma'] =  $list_diploma;
		///khinh nghiệm
		$input_experience = array();
		$list_experience = $this->experience_model->get_list($input_experience);
		$this->data['list_experience'] =  $list_experience;
		//cấp bậc
		$input_rank = array();
		$list_rank = $this->rank_model->get_list($input_rank);
		$this->data['list_rank'] =  $list_rank;
		///ngành nghề
		$input_career = array();
		$list_career = $this->career_model->get_list($input_career);
		$this->data['list_career'] =  $list_career;
		///tỉnh thành phố
		$input_city= array();
		$list_city = $this->city_model->get_list($input_city);

		$this->data['list_city'] =  $list_city;
		$login_job = $this->session->userdata('user2_login');
				$this->data['user2_login'] = $login_job ;
				//neu ton tai login thi lay thong tin các thanh vien
				if($login_job){
					$this->load->model('jobseeker_model');
					$jobseeker_info = $this->jobseeker_model->get_info($login_job);
					$this->data['jobseeker_info'] = $jobseeker_info;
				}
		$jobID = $jobseeker_info->id;
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề','required|min_length[8]');
			$this->form_validation->set_rules('wage','Mức lương','required');
			$this->form_validation->set_rules('diploma','Trình độ','required');
			$this->form_validation->set_rules('exp','Kinh nghiệm','required');
			$this->form_validation->set_rules('ranks','Cấp bậc','required');
			$this->form_validation->set_rules('career','Ngành nghề','required');
			$this->form_validation->set_rules('city','Thành phố','required');
			$this->form_validation->set_rules('display','Hiển thị tin','required');
		//	$this->form_validation->set_rules('image','File','required');

		}
		if($this->form_validation->run()){
			$this->load->library('upload_library');
			$upload_path = './uploads/jobseeker/hoso';
			$upload_data = $this->upload_library->upload_file($upload_path,'image');
			$image_link ='';
			if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
			}
			$title = $this->input->post('title');
			$wage = $this->input->post('wage');
			$diploma = $this->input->post('diploma');
			$experience = $this->input->post('exp');
			$rank = $this->input->post('ranks');
			$career =$this->input->post('career');
			$city = $this->input->post('city');
			$display = $this->input->post('display');
			$time_now = standard_date('DATE_ATOM', time());
			$data = array(
				'sJobTitle'=>$title,
				'sWage'=>$wage,
				'iDiplomaID'=>$diploma,
				'sExperience'=>$experience,
				'iRankID'=>$rank,
				'iCareerID'=>$career,
				'iCityID'=>$city,
				'iDisplay'=>$display,
				'iJobID'=>$jobID,
				'sFileName'=>$image_link,
				'sDatePost'=>$time_now,
				);
			if($this->job_model->create($data)){
				$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(nguoitimviec_url('user_job'));
		}
		$this->data['template'] ='nguoitimviec/hoso/upload';
		$this->load->view('nguoitimviec/main',$this->data);

	}
	function edit_upload(){
		$id = $this->uri->rsegment('3');
		$this->load->library('form_validation');
		$this->load->helper('form');
		///trình độ
		$input_diploma = array();
		$list_diploma = $this->diploma_model->get_list($input_diploma);
		$this->data['list_diploma'] =  $list_diploma;
		///khinh nghiệm
		$input_experience = array();
		$list_experience = $this->experience_model->get_list($input_experience);
		$this->data['list_experience'] =  $list_experience;
		//cấp bậc
		$input_rank = array();
		$list_rank = $this->rank_model->get_list($input_rank);
		$this->data['list_rank'] =  $list_rank;
		///ngành nghề
		$input_career = array();
		$list_career = $this->career_model->get_list($input_career);
		$this->data['list_career'] =  $list_career;
		///tỉnh thành phố
		$input_city= array();
		$list_city = $this->city_model->get_list($input_city);

		$this->data['list_city'] =  $list_city;
		$login_job = $this->session->userdata('user2_login');
				$this->data['user2_login'] = $login_job ;
				//neu ton tai login thi lay thong tin các thanh vien
				if($login_job){
					$this->load->model('jobseeker_model');
					$jobseeker_info = $this->jobseeker_model->get_info($login_job);
					$this->data['jobseeker_info'] = $jobseeker_info;
				}
		$jobID = $jobseeker_info->id;

		///lấy danh sách tiêu đề
		$input = array('id'=>$id,'iJobID'=>$jobID);
		//$input['where'] = array('id'=>$id);
		$info = $this->job_model->get_info_rule($input);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(nguoitimviec_url('user_job'));
		}
		$this->data['info']=$info;
		///trình đô
		$info_diploma  = $this->diploma_model->get_info($info->iDiplomaID);
		$this->data['info_diploma']=$info_diploma;
		///kinh nghiem
		$info_exp = $this->experience_model->get_info($info->sExperience);
		$this->data['info_exp']=$info_exp;
		///cap bac
		$info_rank = $this->rank_model->get_info($info->iRankID);
		$this->data['info_rank']=$info_rank;
		///nganh nghe
		$info_career = $this->career_model->get_info($info->iCareerID);
		$this->data['info_career']=$info_career;
		///noi lam viec
		$info_city = $this->city_model->get_info($info->iCityID);
		$this->data['info_city']=$info_city;
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề','required|min_length[8]');
			$this->form_validation->set_rules('wage','Mức lương','required');
			$this->form_validation->set_rules('diploma','Trình độ','required');
			$this->form_validation->set_rules('exp','Kinh nghiệm','required');
			$this->form_validation->set_rules('ranks','Cấp bậc','required');
	$this->form_validation->set_rules('career','Ngành nghề','required');
			$this->form_validation->set_rules('city','Thành phố','required');
			$this->form_validation->set_rules('display','Hiển thị tin','required');
		//	$this->form_validation->set_rules('image','File','required');

		}
		if($this->form_validation->run()){
			$this->load->library('upload_library');
			$upload_path = './uploads/jobseeker/hoso';
			$upload_data = $this->upload_library->upload_file($upload_path,'image');
			$image_link ='';
			if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
			}
			if($image_link !=''){
				$image_link = $upload_data['file_name'];
			}
			$title = $this->input->post('title');
			$wage = $this->input->post('wage');
			$diploma = $this->input->post('diploma');
			$experience = $this->input->post('exp');
			$rank = $this->input->post('ranks');
			$career =$this->input->post('career');
			$city = $this->input->post('city');
			$display = $this->input->post('display');
			$time_now = standard_date('DATE_ATOM', time());
			$data = array(
				'sJobTitle'=>$title,
				'sWage'=>$wage,
				'iDiplomaID'=>$diploma,
				'sExperience'=>$experience,
				'iRankID'=>$rank,
				'iCareerID'=>$career,
				'iCityID'=>$city,
				'iDisplay'=>$display,
				'iJobID'=>$jobID,
				//'sFileName'=>$image_link,
				'sUpdate'=> $time_now,
				);
			if($image_link){
				$data['sFileName'] = $image_link;
			}
			if($this->job_model->update($id,$data)){
				$this->session->set_flashdata('message','Sửa dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(nguoitimviec_url('user_job'));
		}
		$this->data['template'] ='nguoitimviec/hoso/edit_upload';
		$this->load->view('nguoitimviec/main',$this->data);

	}
	function delete_upload(){
		$id = $this->uri->rsegment('3');
		$info = $this->job_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(nguoitimviec_url('user_job'));
		}
		$this->job_model->delete($id);
		$image_link = './uploads/jobseeker/hoso/'.$info->sFileName;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
			redirect(nguoitimviec_url('user_job'));
	}
}