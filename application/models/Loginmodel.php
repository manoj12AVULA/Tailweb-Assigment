<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function index($data="")
	{	

		$email = $data['email'];
		$password = $data['password'];

		$user_data = $this->db->where('email',$email)->get('user_details');

		if($user_data->row()){

			$password_ver = password_verify($password, $user_data->password);

			if($password_ver)
			{
				$this->session->set_userdata('login_data',mt_rand(11111,99999));

				return true;
			}else{
				return false;
			}

		}else{
			return false;
		}
	}
}