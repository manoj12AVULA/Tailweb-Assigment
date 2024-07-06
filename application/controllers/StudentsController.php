<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentsController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('StudentsModel');

	}

	public function index(){


		$data['students'] = $this->StudentsModel->student_data();
		
		if(!empty($data['students'])){

			$this->load->view('students_details',$data);
		}else{
			return false;
		}
	}

	public function update_user(){
		
	}

	public function delete_user($studet_id){

		$data = $studet_id;

		$delete = $this->StudentsModel->delete_student($data);

		if($delete){
			$this->session->set_flashdata('deleteSuccess',"Details Removed Successfully");
			redirect('StudentsController/index');
		}else{
			$this->session->set_flashdata('deleteError',"Check Data");
			return false;
		}
	}

	public function add_student(){
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('subject','Subject Name','required|trim');
		$this->form_validation->set_rules('marks','Marks','required|trim');


		if($this->form_validation->run()){
			$data = $this->input->post();

			if(!empty($data)){

				$form_data = [
					'name' => $data['name'] ?? '' ,
					'subject_name' => $data['subject'] ?? '',
					'marks' => $data['marks'] ?? '',
					
				];

				$query = $this->StudentsModel->add_student($form_data);

				if($query){
					$this->session->set_flashdata('userAdd',"New Student Added Successfully");
					redirect('StudentsController/index');
				}else{
					$this->session->set_flashdata('AddError',"Uses not Added");
					redirect('StudentsController/index');
					
				}
			}else{
				return false;
			}
		}else{
			$this->load->view('login');
		}
	}


}