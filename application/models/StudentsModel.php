<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentsModel extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function student_data(){

		$query = $this->db->get('students_details');

		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}

	public function add_student($form_data){
		if($this->db->insert('students_details',$form_data)){
			return true;
		}else{
			return false;
		}
	}

	public function total_rows(){
		$q = $this->db->get('students_details');

		if($q->num_rows()){
			return  $q->num_rows();
		}else{
			return false;
		}
	}

	public function update_student($student_id){
		// $q =$this->db->where('id',$student_id)->get('students_details');

		// if($q->num_rows()){
		// 	return $q->row();
		// }else{
		// 	false;
		// }
	}

	public function delete_student($student_id){
		$query = $this->db->where('id',$student_id)->delete('students_details');

		if($query){
			return true;

		}else{
			return false;
		}

	}
}