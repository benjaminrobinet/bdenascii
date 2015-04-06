<?php 
	namespace Classes;

	use \Classes\Database;

	/**
	* BD class
	*/
	class Bd {

		public $current = 0;

		public function getLast()
		{
			$bd = Database::$instance->query('SELECT * FROM comics ORDER BY id DESC')->fetch();
			return $bd;
		}

		public function getById($id)
		{
			$bd = Database::$instance->query("SELECT * FROM comics WHERE id = $id")->fetch();
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

		public static function add($title, $file)
		{
			$ext = Utils::getExt($file['file']['name']);
			$extSize = strlen($ext);
			$filename = Utils::convertToUrl($file['file']['name']);
			$filename = substr($filename, 0, - $extSize) . '.' . $ext;

			move_uploaded_file($file['file']['tmp_name'], UPLOAD_DIR . $filename);
			$req = Database::$instance->prepare('INSERT INTO comics (title, file) VALUES (:title, :file)');
			$res = $req->execute(array("title" => $title, "file" => $filename));
			return true;
		}
	}
?>