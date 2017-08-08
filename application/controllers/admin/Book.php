<?php
	class Book extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Book_m');
		}

		public function index(){
			$this->data['page_info'] = array(
				'title' => 'Your Book List',
				'css' => array('admin.css'),
				'js' => array()
				);

			$this->data['subview'] = 'admin/entry/Book/list';
			$this->data['bookData'] = $this->Book_m->get();

			$this->load->view('components/main_layout', $this->data);
		}

		public function edit($id = null){
			if($id != null)
				$this->data['bookData'] = $this->Book_m->get_by(array('id' => intval($id)), TRUE);
			$this->data['page_info'] = array(
				'title' => 'Edit Entry',
				'css' => array('admin.css',
					'bootstrap-tagsinput.css'),
				'js' => array('moment/moment.min.js', 'datepicker/bootstrap-datetimepicker.js',
					'bootstrap-tagsinput.min.js',
					'admin.js')
				);
			$this->data['subview'] = 'admin/entry/Book/edit';

			//Form validation for submitting
			$rules = $this->Book_m->rules;
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == TRUE){

				$postBook = array(
					'title', 'summary', 'image', 'realease', 'language', 'rating', 'publisher', 'author', 'tags'
					);

				$dataBook = $this->Book_m->array_from_post($postBook);

				$summary = $dataBook['summary'];
				$summary = "<p>".$summary."</p>";
				$dataBook['summary'] = str_replace("\n", "</p><p>", $summary);

				//file upload
				$config['upload_path'] = './images/Post/Book/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image'))
        {
        	$this->data['fileError'] = $this->upload->display_errors();
        }
        else
        {
        	$a = $this->upload->data();
        	rename($a['full_path'],$a['file_path'].$dataBook['title'].$a['file_ext']);
        	$this->data['uploadData'] = $this->upload->data();

        	$dataBook['image'] = $dataBook['title'].$a['file_ext'];

        	$this->Book_m->save($dataBook, $id);
        	redirect('admin/book');
        }

			} else {

				$this->data['error'] = validation_errors();
			}

			$this->load->view('components/main_layout', $this->data);
		}

		public function databook(){
			$json = $this->Book_m->get_grouped();
			$this->data['datajson'] = json_encode($json, JSON_NUMERIC_CHECK);
			$this->load->view('json', $this->data);
		}
	}
?>