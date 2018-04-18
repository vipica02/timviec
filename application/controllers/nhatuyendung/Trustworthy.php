<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Trustworthy extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('trustworthy_model');
		$this->load->model('career_model');
		$this->load->model('city_model');
		$this->load->model('formwork_model');
		$this->load->model('experience_model');
		$this->load->model('naturework_model');
		$this->load->model('diploma_model');
		$this->load->model('wege_model');
		$this->load->model('probationary_model');
		$this->load->model('career_model');
		$this->load->model('saveresume_model');

		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$login_employer = $this->session->userdata('user_login');
		$this->data['user_login'] = $login_employer ;
		if($login_employer){
			$this->load->model('employer_model');
			$employer_info = $this->employer_model->get_info($login_employer);
			$this->data['employer_info'] = $employer_info;
		}
		$id_employer  = $employer_info->id;
		$input = array();
		$input['where'] = array('iEmployerID'=>$id_employer);
		$list = $this->trustworthy_model->get_list($input);
		$this->data['list']=$list;
		
		// $input = array();,
		// $list = $this->trustworthy_model->get_list($input);
		// $this->data['list'] = $list;
		foreach ($list as  $value) {
			$inpu = array();
			$inpu['where'] = array('iEmployerID'=>$value->id);
			$total[] = $this->saveresume_model->get_total($inpu);		
		}
		if(!empty($total)){
			$this->data['total']=$total;
		}
		
		/////

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['template'] ='nhatuyendung/dangtin/index';
		$this->load->view('nhatuyendung/main',$this->data);
	}
	//check usernam
	function check_usename(){
		$username =$this->input->post('username');
		$where  = array('sUserName'=> $username );
		if($this->Trustworthy_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
			return false;
		}
		return true;
	}
	function check_email(){
		$username =$this->input->post('email');
		$where  = array('sEmail'=> $username );
		if($this->Trustworthy_model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,'Email này đã tồn tại');
			return false;
		}
		return true;
	}
	//them moi quan tri vien
	function add(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		//////
		$input = array();
		$list = $this->naturework_model->get_list($input);
		$this->data['list']=$list;
		////
		$input = array();
		$list1 = $this->diploma_model->get_list($input);
		$this->data['list1']=$list1;
		////
		$input = array();
		$list2 = $this->experience_model->get_list($input);
		$this->data['list2']=$list2;
		////
		$input = array();
		$list3 = $this->wege_model->get_list($input);
		$this->data['list3']=$list3;
		////
		$input = array();
		$list4 = $this->formwork_model->get_list($input);
		$this->data['list4']=$list4;
		////
		$input = array();
		$list5 = $this->probationary_model->get_list($input);
		$this->data['list5']=$list5;
		////
		$input = array();
		$list6 = $this->career_model->get_list($input);
		$this->data['list6']=$list6;
		////
		////
		$login_employer = $this->session->userdata('user_login');
		$this->data['user_login'] = $login_employer ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_employer){
			$this->load->model('employer_model');
			$employer_info = $this->employer_model->get_info($login_employer);
			$this->data['employer_info'] = $employer_info;
		}
		//neu ma co du lieu post len thi kiem tra
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề','required|min_length[8]');
			$this->form_validation->set_rules('number','Số lượng','required');
			$this->form_validation->set_rules('gender','Giới tính','required');
			$this->form_validation->set_rules('JobContent','Mô tả công việc','required|min_length[8]');
			$this->form_validation->set_rules('requireskill','Yêu cầu cong việc','required|min_length[8]');
			$this->form_validation->set_rules('nature','Tính chất công việc','required');
			$this->form_validation->set_rules('diploma','Trình độ','required');
			$this->form_validation->set_rules('experience','Kinh nghiệm','required');
			$this->form_validation->set_rules('nature','Tính chất công việc','required');
			$this->form_validation->set_rules('diploma','Trình độ','required');

			$this->form_validation->set_rules('wage','Mức lương','required');
			$this->form_validation->set_rules('formwork','Hình thức làm việc','required');
			$this->form_validation->set_rules('probationary','Thời gian thử việc','required');
			$this->form_validation->set_rules('career','Ngành nghề','required');

			$this->form_validation->set_rules('workplace','Nơi làm việc','required');
			$this->form_validation->set_rules('aboutright','Quyền lợi','required|min_length[8]');
			$this->form_validation->set_rules('date_expiration','Ngày hết hạn','required');
			$this->form_validation->set_rules('current','Hiển thị tin','required');
			$posts = $this->input->post('name');
			if($posts){
				$this->form_validation->set_rules('name','Tên người','required');
				$this->form_validation->set_rules('email','Email','required');
				$this->form_validation->set_rules('address','Địa chỉ','required');
				$this->form_validation->set_rules('phone','Số điện thoại','required');		
			}

		}
		if($this->form_validation->run()){
			$title = $this->input->post('title');
			$number = $this->input->post('number');
			$gender = $this->input->post('gender');
			$JobContent = $this->input->post('JobContent');
			$requireskill = $this->input->post('requireskill');
			$nature =$this->input->post('nature');
			$diploma = $this->input->post('diploma');
			$experience = $this->input->post('experience');
			$wage = $this->input->post('wage');
			$formwork = $this->input->post('formwork');
			$probationary = $this->input->post('probationary');
			$career = $this->input->post('career');

			$workplace = $this->input->post('workplace');
			$aboutright = $this->input->post('aboutright');
			$date_expiration = $this->input->post('date_expiration');
			$current = $this->input->post('current');
			$name = $this->input->post('name');
			$email =$this->input->post('email');
			$address = $this->input->post('address');
			$phone = $this->input->post('phone');
			$date_register = standard_date('DATE_ATOM', time());
			$data = array(
				'iEmployerID'=>$employer_info->id,
				'sJobTitle'=>$title,
				'sNumBer'=> $number,
				'iGender'=>$gender,
				'sJobContent'=>$JobContent,
				'sRequireSkill'=>$requireskill,
				'iNatureWorkID'=>$nature,
				'iExperienceID'=>$experience,
				'iDiplomaID'=>$diploma,
				'iwageID'=>$wage,
				'iFormWorkID'=>$formwork,
				'iProbationTimeID'=>$probationary,
				'iCareerID'=>$career,
				/////
				'sWorkPlace'=>$workplace,
				'sAboutRight'=>$aboutright,
				'dLastedDate'=>nice_date($date_expiration,'y-d-m'),
				'iProbationTimeID'=>$probationary,
				'iCurrent'=>$current,
				'dDatePosted'=>$date_register,
				
				);
			if($posts){
				$data2 = array(
					'sContactName'=>$name,
					'sContactEmail'=>$email,
					'sAddress'=>$address,
					'sMobile'=>$phone
					);		
			}
		
			if($this->trustworthy_model->create($data) || $this->employer_model->update($employer_info->id,$data2)){
				$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(nhatuyendung_url('trustworthy'));
		}
		$this->data['template'] ='nhatuyendung/dangtin/add';
		$this->load->view('nhatuyendung/main',$this->data);

	}
	function edit(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$id = $this->uri->rsegment('3');
		$info = $this->trustworthy_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(Trustworthy_url('Trustworthy'));
		}
		$this->data['info']=$info;
		///laays danh sách hình thức làm việc
		$input = array();
		$list = $this->naturework_model->get_list($input);
		$this->data['list']=$list;
		$info_naturework = $this->naturework_model->get_info($info->iNatureWorkID);
		$this->data['info_naturework']=$info_naturework;
		////
		$input = array();
		$list1 = $this->diploma_model->get_list($input);
		$this->data['list1']=$list1;
		$info_diploma = $this->diploma_model->get_info($info->iDiplomaID);
		$this->data['info_diploma']=$info_diploma;
		////
		$input = array();
		$list2 = $this->experience_model->get_list($input);
		$this->data['list2']=$list2;
		$info_exp = $this->experience_model->get_info($info->iExperienceID);
		$this->data['info_exp']=$info_exp;
		////
		$input = array();
		$list3 = $this->wege_model->get_list($input);
		$this->data['list3']=$list3;
		$info_wege = $this->wege_model->get_info($info->iWageID);
		$this->data['info_wege']=$info_wege;
		////
		$input = array();
		$list4 = $this->formwork_model->get_list($input);
		$this->data['list4']=$list4;
		$info_formwork = $this->formwork_model->get_info($info->iFormWorkID);
		$this->data['info_formwork']=$info_formwork;
		////
		$input = array();
		$list5 = $this->probationary_model->get_list($input);
		$this->data['list5']=$list5;
		$info_probationary = $this->probationary_model->get_info($info->iProbationTimeID);
		$this->data['info_probationary']=$info_probationary;
		////
		$input = array();
		$list6 = $this->career_model->get_list($input);
		$this->data['list6']=$list6;
		$info_career = $this->career_model->get_info($info->iCareerID);
		$this->data['info_career']=$info_career;
		///tn tại dang nhap
		$login_employer = $this->session->userdata('user_login');
		$this->data['user_login'] = $login_employer ;
				//neu ton tai login thi lay thong tin các thanh vien
		if($login_employer){
			$this->load->model('employer_model');
			$employer_info = $this->employer_model->get_info($login_employer);
			$this->data['employer_info'] = $employer_info;
		}
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề','required|min_length[8]');
			$this->form_validation->set_rules('number','Số lượng','required');
			$this->form_validation->set_rules('gender','Giới tính','required');
			$this->form_validation->set_rules('JobContent','Mô tả công việc','required|min_length[8]');
			$this->form_validation->set_rules('requireskill','Yêu cầu cong việc','required|min_length[8]');
			$this->form_validation->set_rules('nature','Tính chất công việc','required');
			$this->form_validation->set_rules('diploma','Trình độ','required');
			$this->form_validation->set_rules('experience','Kinh nghiệm','required');
			$this->form_validation->set_rules('nature','Tính chất công việc','required');
			$this->form_validation->set_rules('diploma','Trình độ','required');

			$this->form_validation->set_rules('wage','Mức lương','required');
			$this->form_validation->set_rules('formwork','Hình thức làm việc','required');
			$this->form_validation->set_rules('probationary','Thời gian thử việc','required');
			$this->form_validation->set_rules('career','Ngành nghề','required');

			$this->form_validation->set_rules('workplace','Nơi làm việc','required');
			$this->form_validation->set_rules('aboutright','Quyền lợi','required|min_length[8]');
			$this->form_validation->set_rules('date_expiration','Ngày hết hạn','required');
			$this->form_validation->set_rules('current','Hiển thị tin','required');
			$posts = $this->input->post('name');
			if($posts){
				$this->form_validation->set_rules('name','Tên người','required');
				$this->form_validation->set_rules('email','Email','required');
				$this->form_validation->set_rules('address','Địa chỉ','required');
				$this->form_validation->set_rules('phone','Số điện thoại','required');		
			}

		}
		if($this->form_validation->run()){
			$title = $this->input->post('title');
			$number = $this->input->post('number');
			$gender = $this->input->post('gender');
			$JobContent = $this->input->post('JobContent');
			$requireskill = $this->input->post('requireskill');
			$nature =$this->input->post('nature');
			$diploma = $this->input->post('diploma');
			$experience = $this->input->post('experience');
			$wage = $this->input->post('wage');
			$formwork = $this->input->post('formwork');
			$probationary = $this->input->post('probationary');
			$career = $this->input->post('career');

			$workplace = $this->input->post('workplace');
			$aboutright = $this->input->post('aboutright');
			$date_expiration = $this->input->post('date_expiration');
			$current = $this->input->post('current');
			$name = $this->input->post('name');
			$email =$this->input->post('email');
			$address = $this->input->post('address');
			$phone = $this->input->post('phone');
			$date_register = standard_date('DATE_ATOM', time());
			$data = array(
				'iEmployerID'=>$employer_info->id,
				'sJobTitle'=>$title,
				'sNumBer'=> $number,
				'iGender'=>$gender,
				'sJobContent'=>$JobContent,
				'sRequireSkill'=>$requireskill,
				'iNatureWorkID'=>$nature,
				'iExperienceID'=>$experience,
				'iDiplomaID'=>$diploma,
				'iwageID'=>$wage,
				'iFormWorkID'=>$formwork,
				'iProbationTimeID'=>$probationary,
				'iCareerID'=>$career,
				/////
				'sWorkPlace'=>$workplace,
				'sAboutRight'=>$aboutright,
				'dLastedDate'=>nice_date($date_expiration,'y-m-d'),
				'iProbationTimeID'=>$probationary,
				'iCurrent'=>$current,
				'dDatePosted'=>$date_register,
				
				);
			if($posts){
				$data2 = array(
					'sContactName'=>$name,
					'sContactEmail'=>$email,
					'sAddress'=>$address,
					'sMobile'=>$phone
					);		
			}
		
			if($this->trustworthy_model->update($id,$data) || $this->employer_model->update($employer_info->id,$data2)){
				$this->session->set_flashdata('message','Sửa dữ liệu thành công');
			} else{
				$this->session->set_flashdata('message','Không thành công');
			}
			redirect(nhatuyendung_url('trustworthy'));
		}
		$this->data['template'] ='nhatuyendung/dangtin/edit';
		$this->load->view('nhatuyendung/main',$this->data);
	}
	function delete(){
		$id = $this->uri->rsegment('3');
		$info = $this->trustworthy_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message','không tồn tại quản trị viên');
			redirect(nhatuyendung_url('trustworthy'));
		}
		$this->trustworthy_model->delete($id);
		
		$this->session->set_flashdata('message','Xóa dữ liệu thành công');
			redirect(nhatuyendung_url('trustworthy'));
	}
	
	// function delete_check(){
		
	// 	$address = $this->input->post('xoa');
	// 	$info = $this->Trustworthy_model->get_info($id);
	// 	if(!$info){
	// 		$this->session->set_flashdata('message','không tồn tại quản trị viên');
	// 		redirect(Trustworthy_url('Trustworthy'));
	// 	}
	// 	if(!empty($address)){
	// 		for ($i=0; $i < count($address) ; $i++) { 
	// 			$this->Trustworthy_model->delete($address[$i]);
	// 		}
	// 	}
	// 	$this->session->set_flashdata('message','Xóa dữ liệu thành công');
	// 		redirect(nhatuyendung_url('Trustworthy'));	
	// }

	// function logout(){
	// 	if($this->session->userdata('login')){
	// 		$this->session->unset_userdata('login');
	// 	}
	// 	redirect(nhatuyendung_url('login'));
	// }
}