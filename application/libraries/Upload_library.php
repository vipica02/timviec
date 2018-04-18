<?php 
/**
* 
*/
class Upload_library 
{
	var $CI = '';
	function __construct()
	{
		$this->CI = & get_instance();
	}
	//duong dan luu file
	function upload_file($upload_path = '',$file_name){
		$config = $this->config_file($upload_path);
		$this->CI->load->library('upload',$config);
		if($this->CI->upload->do_upload($file_name)){
			$data = $this->CI->upload->data();
		}else{
			
			$data = $this->CI->upload->display_errors();
		}
		return $data;
	}
	function upload($upload_path = '',$file_name){
		$config = $this->config($upload_path);
		$this->CI->load->library('upload',$config);
		if($this->CI->upload->do_upload($file_name)){
			$data = $this->CI->upload->data();
		}else{
			
			$data = $this->CI->upload->display_errors();
		}
		return $data;
	}
 	
	function config($upload_path = ''){
		$config = array();
         //thuc mục chứa file
		$config['upload_path']   = $upload_path;
         //Định dạng file được phép tải
		$config['allowed_types'] = 'jpg|png|gif';
         //Dung lượng tối đa
		$config['max_size']      = '1200';
         //Chiều rộng tối đa
		$config['max_width']     = '2000';
         //Chiều cao tối đa
		$config['max_height']    = '2000';
		return $config;
	}
	function config_file($upload_path = ''){
		$config = array();
         //thuc mục chứa file
		$config['upload_path']   =  $upload_path;
		// $config['create_thumb']    = TRUE,
  //       $config['maintain_ratio']  = TRUE,
         //Định dạng file được phép tải
		$config['allowed_types'] = 'pdf|doc|docx';
         //Dung lượng tối đa
		$config['max_size'] = '100000';
		return $config;
	}
}