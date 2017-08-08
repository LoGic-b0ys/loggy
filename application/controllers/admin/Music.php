<?php
	class Music extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Music_m');
		}

		public function index(){
			$this->data['page_info'] = array(
				'title' => 'Your Music List',
				'css' => array('admin.css'),
				'js' => array()
				);

			$this->data['subview'] = 'admin/entry/Music/list';
			$this->data['musicData'] = $this->Music_m->get();

			$this->load->view('components/main_layout', $this->data);
		}

		public function edit($id = null){
			if($id != null)
				$this->data['musicData'] = $this->Music_m->get_by(array('id' => intval($id)), TRUE);
			$this->data['page_info'] = array(
				'title' => 'Edit Entry',
				'css' => array('admin.css'),
				'js' => array('moment/moment.min.js', 'datepicker/bootstrap-datetimepicker.js',
					'bootstrap-tagsinput.min.js',
					'admin.js')
				);
			$this->data['subview'] = 'admin/entry/Music/edit';

			//Form validation for submitting
			$rules = $this->Music_m->rules;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){

				$postMusic = array(
					'title', 'summary', 'image', 'realease', 'language', 'rating', 'artist', 'album'
					);

				$dataMusic = $this->Music_m->array_from_post($postMusic);

				$summary = $dataMusic['summary'];
				$summary = "<p>".$summary."</p>";
				$dataMusic['summary'] = str_replace("\n", "</p><p>", $summary);

				//file upload
				$config['upload_path'] = './images/Post/Music/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image'))
        {
        	$this->data['fileError'] = $this->upload->display_errors();
        }
        else
        {
        	$a = $this->upload->data();
        	rename($a['full_path'],$a['file_path'].$dataMusic['title'].$a['file_ext']);
        	$this->data['uploadData'] = $this->upload->data();

        	$dataMusic['image'] = $dataMusic['title'].$a['file_ext'];

        	$this->Music_m->save($dataMusic, $id);
        	redirect('admin/music');
        }

			} else {

				$this->data['error'] = validation_errors();
			}

			$this->load->view('components/main_layout', $this->data);
		}

		public function datamusic(){
			$json = $this->Music_m->get_grouped();
			$this->data['datajson'] = json_encode($json, JSON_NUMERIC_CHECK);
			$this->load->view('json', $this->data);
		}
	}
?>