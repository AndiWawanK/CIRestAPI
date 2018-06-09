<?php

	class User extends CI_Model{

		public function insert(){

			$data = array(
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);

			if($this->db->insert('users', $data)){
				return [
					'id' 		=> $this->db->insert_id(),
					'success' 	=> true,
					'message' 	=> 'data successfully entered'
				];
			}
		}

		public function get($key = null, $value = null){
			if($key != null){
				return $this->db->get_where('users', array($key => $value))->row();
			}
			return $this->db->get('users')->result();
		}

		public function is_valid(){
			$email 		= $this->input->post('email');
			$password = $this->input->post('password');

			$hash = $this->get('email', $email)->password;

			if(password_verify($password, $hash))
					return true;

				return false;
			

		}

		public function delete_user($id = null){
			$data = $this->db->get_where('users', array('id_users' => $id))->row();
			if($data != null){
				return $this->db->delete('users', array('id_users' => $id));
			}
		}
	}
