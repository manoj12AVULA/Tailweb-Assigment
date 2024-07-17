<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentsModel extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function student_data($limit,$offset){

		$query = $this->db->limit($limit,$offset)->get('students_details');

		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}

	public function add_student($form_data){
		$chkStd = $this->db->where('name',$form_data['name'])->where('subject_name',$form_data['subject_name'])->get('students_details');
		if($chkStd->num_rows() > 0){
			$std_data = $chkStd->result();
			// print_r($std_data);
			$marks = $std_data[0]->marks;
			$form_data['marks'] += $marks;
			$id = $std_data[0]->id;
			$this->db->where('id',$id)->update('students_details', $form_data);
			return true;
		} else {
			if($this->db->insert('students_details',$form_data)){
				return true;
			}else{
				return false;
			}
		}
			
	}

	// public function total_rows(){
	// 	return $this->db->count_all($this->'students_details');
	// }

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