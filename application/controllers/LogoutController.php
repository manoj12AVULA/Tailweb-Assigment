<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoutController extends CI_Controller {
	public function logout(){
		if($this->session->has_userdata('login_data')){
			$this->session->unset_userdata('login_data');
			redirect('LoginController');
		}else{
			redirect('StudentsController/index');
		}
	}
}
