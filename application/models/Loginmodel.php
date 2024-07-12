<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function login_user($data)
	{	

		$email = $data['email'];
		$password = $data['password'];

		$user_data = $this->db->where('email',$email)->get('user_details');

		
		if($user_data->num_rows()){

			return $user_data->row();
		}else{
			
			return false;
		}
	}
}