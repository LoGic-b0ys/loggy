<?php 
	class Book extends Frontend_Controller{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			//Page Info
			$this->data['page_info'] = array(
				'title' => 'Log you activities | Loggy',
				'css' => array('slider.css', 'item.css'),
				'js' => array('owl-carousel.js', 'slider.js', 'full-page.js')
				);
			$this->data['subview'] = 'home';

			//Item List Info
			$this->load->model('Book_m');
			$this->data['entryData'] = $this->Book_m->get();

			$this->load->view('components/main_layout', $this->data);
		}

		public function getData($id){
			$this->load->model('Book_m');
			$dataPost = array('id' => $id);
			$this->data['res'] = $this->Book_m->get_by($dataPost, TRUE);
			$this->load->view('entry/Book', $this->data);
		}
	}
?>