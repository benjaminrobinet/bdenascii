<?php 
	namespace Classes;

	use \Classes\Database as Database;

	/**
	* BD class
	*/
	class Bd {

		public $current = 0;

		public function getLast()
		{
			$bd = Database::$instance->query('SELECT * FROM bds ORDER BY id DESC')->fetch();
			return $bd;
		}

		public function getById($id)
		{
			$bd = Database::$instance->query("SELECT * FROM bds WHERE id = $id")->fetch();
			return $bd;
		}

		public function exists($id)
		{
			if(isset($id) && is_numeric($id)){
				$bd = $this->getById($id);
				if($bd){
					return true;
				}
			} else {
				return false;
			}
		}

		public function setCurrent($id)
		{ 
			$this->current = $id;
			return $this->current;
		}

		public function getPrevious()
		{
			$prev = $this->getById($this->current - 1);
			return $prev;
		}

		public function getNext()
		{
			$next = $this->getById($this->current + 1);
			return $next;
		}
	}
?>