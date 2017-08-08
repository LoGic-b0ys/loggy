<?php
	class Video extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Video_m');
		}

		public function index(){
			$this->data['page_info'] = array(
				'title' => 'Your Movie List',
				'css' => array('admin.css'),
				'js' => array()
				);

			$this->data['subview'] = 'admin/entry/Video/list';
			$this->data['videoData'] = $this->Video_m->get();

			$this->load->view('components/main_layout', $this->data);
		}

		public function edit($id = null){
			if($id != null)
				$this->data['videoData'] = $this->Video_m->get_by(array('id' => intval($id)), TRUE);
			$this->data['page_info'] = array(
				'title' => 'Edit Entry',
				'css' => array('admin.css', 
					'editor/external/google-code-prettify/prettify.css', 
					'editor/index.css',
					'bootstrap-tagsinput.css'),
				'js' => array('moment/moment.min.js', 'datepicker/bootstrap-datetimepicker.js',
					'editor/bootstrap-wysiwyg.js',
					'editor/external/jquery.hotkeys.js',
					'editor/external/google-code-prettify/prettify.js',
					'editor/editor.js',
					'bootstrap-tagsinput.min.js',
					'admin.js')
				);
			$this->data['subview'] = 'admin/entry/Video/edit';

			//Form validation for submitting
			$rules = $this->Video_m->rules;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){

				$postVideo = array(
					'title', 'summary', 'synopsis', 'image', 'realease', 'language', 'tags', 'rating'
					);

				$dataVideo = $this->Video_m->array_from_post($postVideo);

				//file upload
				$config['upload_path'] = './images/Post/Video/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image'))
        {
        	$this->data['fileError'] = $this->upload->display_errors();
        }
        else
        {
        	$a = $this->upload->data();
        	rename($a['full_path'],$a['file_path'].$dataVideo['title'].$a['file_ext']);
        	$this->data['uploadData'] = $this->upload->data();

        	$dataVideo['image'] = $dataVideo['title'].$a['file_ext'];

        	$this->Video_m->save($dataVideo, $id);
        	redirect('admin/video');
        }

			} else {

				$this->data['error'] = validation_errors();
			}

			$this->load->view('components/main_layout', $this->data);
		}
	}
?>