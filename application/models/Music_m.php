<?php
	/**
	* 
	*/
	class Music_m extends MY_Model
	{
		protected $_table_name = 'music';
		protected $_order_by = 'created';
		protected $_order = 'desc';
		protected $_timestamps = TRUE;
		public $rules = array(
				array(
					'field' => 'title',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'summary',
					'rules' => 'trim|required|xss_clean'
					),
				array(
					'field' => 'realease',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'language',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'artist',
					'rules' => 'trim|required'
					)
			);

		function __construct()
		{
			parent::__construct();
		}
	}
?>