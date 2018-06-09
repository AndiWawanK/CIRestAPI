<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH .'libraries/JWT.php';
use \Firebase\JWT\JWT;
class Users extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('user');
	}

	public function response($data){
		if($data != null){
			$this->output
				 ->set_content_type('application/json')
				 ->set_status_header(200)
				 ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				 ->_display();

			exit;
		}else{
			$data = array(
				'status' => false,
				'message' => 'User Not Found'
			);
			$this->output
        ->set_status_header(404)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();

				exit;
		}
	}

	public function register(){
		return $this->response($this->user->insert());
	}

	public function get_all(){
		return $this->response($this->user->get());
	}

	public function get_user($id){
		return $this->response($this->user->get('id_users', $id));
	}


	public function login(){
		// var_dump($this->user->is_valid());
		// die();
		if(!$this->user->is_valid()){
			return $this->response([
				'status'  => false,
				'message' => "Email atau Password Salah!"
			]);
		}
		die('hard');
	}

	public function deleted($data){
		if($data != null){
			$respon = array(
				'status' => true,
				'message' => 'User has been deleted'
			);
			$this->output
					 ->set_status_header(200)
					 ->set_content_type('application/json')
					 ->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					 ->_display();
				exit;
		}else{
			$respon = array(
				'status' => false,
				'message' => 'User not found!'
			);
			$this->output
					 ->set_status_header(404)
					 ->set_content_type('application/json')
					 ->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
					 ->_display();
				exit;
		}
	}
	public function delete($id){
		return $this->deleted($this->user->delete_user($id));
	}

}
