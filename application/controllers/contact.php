<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Contact extends MY_Controller
{	
	function __construct(){
		parent::__construct();
		$this->load->model('slider_model');
		$this->load->model('career_model');
		$this->load->model('trustworthy_model');
		$this->load->model('employer_model');
		$this->load->model('post_model');
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	/*
	*lay sanh sach
	*/

	function index(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('email');
// Cấu hình
		$config['protocol'] = 'sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$config['protocol']     = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.googlemail.com'; //neu sử dụng gmail
		$config['smtp_user']    = 'xxxxx';
		$config['smtp_pass']    = 'xxxxx';
		$config['smtp_port']    = '465'; //nếu sử dụng gmail

		$this->email->initialize($config);
		if($this->input->post()){
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$number = $this->input->post('number');
			$fullname = $this->input->post('fullname');
			$subject= $this->input->post('subject');
			$message = $this->input->post('message');

		}
		if($this->form_validation->run()){
			//cau hinh email va ten nguoi gui
			$this->email->from($name,$fullname);
//cau hinh nguoi nhan
			$this->email->to('sangtrank64@gmail.com');

			$this->email->subject($subject);
			$this->email->message($message);

//dinh kem file
		//$this->email->attach('/path/to/photo1.jpg');
//thuc hien gui
			if ( ! $this->email->send())
			{
    // Generate error
				echo $this->email->print_debugger();
			}else{
				echo 'Gửi email thành công';
			}
		}


		$this->data['template'] ='site/contact/index';
		$this->load->view('site/main',$this->data);
	}
	function dangki(){
		$this->data['template'] ='site/dangki/index';
		$this->load->view('site/main',$this->data);
	}
}