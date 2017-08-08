<?php
	class User_m extends MY_Model{
		protected $_table_name = 'user_admin';
		protected $_order_by = 'name';
		public $rules = array(
				array(
					'field' => 'password',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'user',
					'rules' => 'trim|required|xss_clean'
					)
			);
		public function __construct(){
			parent::__construct();
		}

		public function loggedin(){
			return (bool)$this->session->userdata('loggedin');
		}

		public function login(){
			$user = $this -> get_by(array(
				'username' => $this->input->post('user'),
				'password' => $this->hash($this->input->post('password'))
			), TRUE);
			if(count($user)){
				//logged in
				$data = array(
					'name' => $user -> name,
					'username' => $user -> username,
					'id' => $user -> id,
					'loggedin' => TRUE
				);
				$this->session->set_userdata($data);
				return TRUE;
			}
		}

		public function hash($string){
			return hash('sha512', $string.config_item('encryption_key'));
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('admin/user/login');
		}
	}
?>