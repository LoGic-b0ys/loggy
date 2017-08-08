<?php 
	class Page extends Frontend_Controller{
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
			$this->load->model('Entry_m');
			$this->data['entryData'] = $this->Entry_m->get_entry();

			$this->load->view('components/main_layout', $this->data);
		}
	}
?>