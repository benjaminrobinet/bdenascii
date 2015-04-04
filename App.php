<?php 
	/**
	* 
	*/
	class App
	{
		public function convertToURL($str)
		{
			$str = htmlentities($str, ENT_NOQUOTES, 'utf-8');
			$str = preg_replace('#&([A-Za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
			$str = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $str));
			return strtolower(preg_replace('/-+/', '-', $str));
		}

		public function getLast()
		{
			return Database::$instance->query('SELECT * FROM bds ORDER BY id DESC');
		}

		public function getCurrent($id)
		{
			# code...
		}

		public function getPrevious($current)
		{
			# code...
		}

		public function getNext($current)
		{
			# code...
		}
	}
?>