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

		public function delete_user($id = null){
			return $this->db->delete('users', array('id_users' => $id));
		}
	}
