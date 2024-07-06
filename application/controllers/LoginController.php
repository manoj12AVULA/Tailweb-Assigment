<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('Loginmodel');
	}

	public function index()
	{

		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password ','required|trim');

		if($this->form_validation->run()){
			$data = $this->input->post();

			if(!empty($data)){
				$check = $this->Loginmodel->index($data);

				if($check){
					$this->session->set_flashdata('success', 'Login Successful.');
					redirect('StudentsController/index');
				}else{
					$this->session->set_flashdata('Error' , 'Invalid Login Details');
				}

			}else{
				$this->load->view('login');
			}
			
		}



		
	}
}
