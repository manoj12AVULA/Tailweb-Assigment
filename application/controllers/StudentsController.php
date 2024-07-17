<?php

error_reporting(E_ALL & ~E_NOTICE); // Report all except notices

defined('BASEPATH') OR exit('No direct script access allowed');

class StudentsController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('StudentsModel');

	}

	public function student_data(){


		

		$config = array();
          $config["base_url"] = base_url('/StudentsController/student_data');
          $config["total_rows"] = $this->db->count_all('students_details');
          $config["per_page"] = 10;
         $config["uri_segment"] = 3;


         $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-start">';
	    $config['full_tag_close'] = '</ul></nav>';
	    $config['num_tag_open'] = '<li class="page-item">';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['next_tag_open'] = '<li class="page-item">';
	    $config['next_tag_close'] = '</li>';
	    $config['prev_tag_open'] = '<li class="page-item">';
	    $config['prev_tag_close'] = '</li>';
	    $config['first_tag_open'] = '<li class="page-item">';
	    $config['first_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li class="page-item">';
	    $config['last_tag_close'] = '</li>';
	    $config['attributes'] = array('class' => 'page-link');

	    $config['prev_link'] = '&laquo; Previous';
	    $config['next_link'] = 'Next &raquo;';




         $this->per_page=$config["per_page"]; 
         $this->pagination->initialize($config);  

          $segment = $this->uri->segment(3);
        $page = (isset($segment) && ctype_digit((string)$segment)) ? (int)$segment : 0;

         $data['students'] = $this->StudentsModel->student_data($this->per_page, $page);
		$data['student_user'] = null;
         $data["links"] = $this->pagination->create_links();
             

		$this->load->view('students_details',$data);
			
	}

	public function update_user($id){
		$data = json_decode(file_get_contents('php://students_details'), true);

		print_r($data);
		die();
		
	}

	public function delete_user($studet_id){

		$data = $studet_id;

		$delete = $this->StudentsModel->delete_student($data);

		if($delete){
			$this->session->set_tempdata('deleteSuccess',"Details Removed Successfully",3);
			redirect('student-details');
		}else{
			$this->session->set_tempdata('deleteError',"Check Data",3);
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
					$this->session->set_tempdata('userAdd',"New Student Added Successfully",3);
					redirect('student-details');
				}else{
					$this->session->set_tempdata('AddError',"Uses not Added",3);
					redirect('student-details');
					
				}
			}else{
				return false;
			}
		}else{
			$this->load->view('login');
		}
	}


}