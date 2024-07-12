<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->load->model('RegisterModel');

	}

	public function index(){


		$this->form_validation->set_rules('fname','Full Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','password','required|trim|min_length[8]');
	

		if($this->form_validation->run()){
			$form_data = $this->input->post();

			$check = $this->RegisterModel->insert_data($form_data);

			if($check){
				redirect('LoginController');
			}else{
				$this->load->view('register');
			}


		}else{
			$this->load->view('register');
		}
	}

}