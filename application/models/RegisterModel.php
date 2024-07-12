<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {

	public function insert_data($form_data){

	

			$data['fname'] = $form_data['fname'];
			$data['email'] = $form_data['email'];
			$data['password'] =password_hash($form_data['fname'], PASSWORD_BCRYPT);
			$data['created_at'] =  date('y/m/d');
			$data['status'] = 1;

		

		$q = $this->db->insert('user_details',$data);

		if($q){
			return true;
		}else{
			return false;
		}

	}
}