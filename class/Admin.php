<?php
	namespace Classes;
	
	use \Classes\Database as Database;

	class Admin
	{
		public function isConnected()
		{
			if(isset($_SESSION['id'])){
				return true;
			} else {
				return false;
			}
		}

		public static function isAdmin($username, $password)
		{
			return "slt";
		}
	}
?>