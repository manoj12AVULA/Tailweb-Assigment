<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('LoginModel');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	}

	/*In this Controller Code Explain if user successfully entered ther credentials. directy redirect to Students data page*/ 

	public function index()
	{
		// Validating the user Credentails 

		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password ','required|trim');

		if($this->form_validation->run()){

			$form_data = $this->input->post();

			if(!empty($form_data)){

				$check  = $this->LoginModel->login_user($form_data);

				if($check){
					$this->session->set_userdata('login_user',mt_rand(11111,99999));
					
					$this->session->set_tempdata('loginSuccess', "Login Successfull", 3);

					redirect('student-details');
				}else{
					false;
				}
			}
		}else{
			 $this->load->view('login');
		}



		
}

}
