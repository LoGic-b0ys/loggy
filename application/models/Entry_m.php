<?php
	/**
	* 
	*/
	class Entry_m extends MY_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		public function get_entry($start = null, $end = null){
			$limit = ($start != null && $end != null) ? ' limit '.$start.','.$end : '';
			return $this->db->query('select id, title, directory, image, class, tags, summary, rating, created from video UNION select id, title, directory, image, class, tags, summary, rating, created from music union select id, title, directory, image, class, tags, summary, rating, created from book order by created desc'.$limit)->result();
		}
	}
?>