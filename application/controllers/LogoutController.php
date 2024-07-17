<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoutController extends CI_Controller {

	public function logout(){

		if($this->session->has_userdata('login_user')){

			$this->session->unset_userdata('login_user');
			$this->session->set_tempdata('LogOut',"Logout Successfull",3);

			return $this->load->view('login');

		}else{

			redirect('student-details');

		}
	}
}
