<?php
	namespace Classes;
	
	use \Classes\Database;

	class Admin
	{
		public static $id;
		public static $username;

		public static function isConnected()
		{
			if(isset($_SESSION['id']) && isset($_SESSION['username'])){
				return true;
			} else {
				return false;
			}
		}

		public static function isAdmin($username, $password)
		{
			$req = Database::$instance->prepare("SELECT * FROM users WHERE username = :username");
			$req->execute(array("username" => $username));
			$res = $req->fetch();
			if($req){
				$hashedPassword = hash("sha256", $password);
				if($res['password'] == $hashedPassword){
					self::$id = $res['id'];
					self::$username = $res['username'];
					return true;
				}
			}
			return false;
		}
	}
?>