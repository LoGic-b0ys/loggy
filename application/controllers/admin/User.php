<?php
	class User extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Video_m');
			$this->load->model('Book_m');
			$this->load->model('Music_m');
			$this->load->model('Entry_m');
		}

		public function login(){
			// Page info
			$this->data['page_info'] = array(
					'title' => 'Login | Loggy',
					'no-navigation' => true,
					'css' => array('login.css'),
					'js' => array()
				);
			$this->data['subview'] = 'components/__login_page';

			//redirect to dashboard
			$dashboard = 'admin/user';
			$this->User_m->loggedin() == FALSE || redirect($dashboard);

			//validation form
			$rules = $this->User_m->rules;
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$loginCheck = $this->User_m->login();
				if($loginCheck){
					redirect($dashboard);
				} else {
					$this -> session -> set_flashdata('error', 'That email password combination does not exist. Please login with your valid email and password');
					redirect('admin/user/login', 'refresh');
				}
			}

			$this->load->view("components/main_layout", $this->data);
		}

		public function index(){

			//Page Info
			$this->data['page_info'] = array(
				'title' => 'Dashboard | '.$this->session->userdata('name'),
				'css' => array('admin.css'),
				'js' => array('globalize.min.js', 'dx.chartjs.js', 'demo-charts.js')
				);
			$this->data['subview'] = 'admin/dashboard';

			//statistics
			$this->data['lastVideo'] = $this->Video_m->get(null, TRUE);
			$this->data['statVideo'] = $this->Video_m->get_grouped(TRUE);
			$this->data['lastMusic'] = $this->Music_m->get(null, TRUE);
			$this->data['statMusic'] = $this->Music_m->get_grouped(TRUE);
			$this->data['lastBook'] = $this->Book_m->get(null, TRUE);
			$this->data['statBook'] = $this->Book_m->get_grouped(TRUE);
			$this->data['entryData'] = $this->Entry_m->get_entry(1,3);

			//Load View
			$this->load->view('components/main_layout', $this->data);
		}

		public function logout(){
			$this->User_m->logout();	
		}

		public function dataGraph(){
			$video = $this->Video_m->get_grouped();
			$music = $this->Music_m->get_grouped();
			$book = $this->Book_m->get_grouped();
			$json = array_merge($video, $music, $book);

			$this->data['datajson'] = json_encode($json);
			//$this->data['datajson'] = json_encode($json, JSON_NUMERIC_CHECK);
			$this->load->view('json', $this->data);
		}

		public function setting(){
			$this->data['page_info'] = array(
				'title' => 'Edit Profile',
				'css' => array('admin.css'),
				'js' => array('moment/moment.min.js', 'datepicker/bootstrap-datetimepicker.js',
					'bootstrap-tagsinput.min.js',
					'admin.js')
				);
			$this->data['subview'] = 'admin/setting';

			$rules = array(
				array(
					'field' => 'name',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'username',
					'rules' => 'trim|required|xss_clean'
					),
				array(
					'field' => 'currPass',
					'rules' => 'trim|required|xss_clean'
					),
				array(
					'field' => 'password',
					'rules' => 'trim|required|xss_clean'
					)
			);
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){

				$pass = $this->User_m->array_from_post(array('currPass'));
				$user = $this->User_m->get_by(array(
					'username' => $this->session->userdata('username'),
					'password' => $this->User_m->hash($pass['currPass'])
					), TRUE);

				$this->data['user'] = $user;

				if(count($user)){
					$id = $user->id;
					$newData = $this->User_m->array_from_post(array('name', 'username', 'password'));
					$newData['password'] = $this->User_m->hash($newData['password']);

					$this->User_m->save($newData, $id);

					//file upload
					$config['upload_path'] = './images/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';

	        $this->load->library('upload', $config);

	        if (!$this->upload->do_upload('image'))
	        {
	        	$this->data['fileError'] = $this->upload->display_errors();
	        }
	        else
	        {
	        	$a = $this->upload->data();
	        	rename($a['full_path'],$a['file_path'].'pp'.$a['file_ext']);
	        	$this->data['uploadData'] = $this->upload->data();

	        	redirect('admin/user/setting');
	        }

				} else {
					$this->data['error'] = "<div class='alert alert-danger'>Your password is incorrect</div>";
				}

			} else {

				$this->data['error'] = validation_errors();
			}

			$this->load->view('components/main_layout', $this->data);
		}
	}
?>