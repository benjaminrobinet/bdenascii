<?php 
	class Database extends PDO
	{

		public static $pdo = null;
		public static $instance = null;

		public function __construct($db, $host, $user, $password)
		{
			if(is_null(self::$pdo)){
				return self::$pdo = parent::__construct("mysql:dbname=$db;host=$host", $user, $password);
			} else {
				return self::$pdo;
			}
		}

		public static function init($db, $host = "localhost", $user = "root", $password = "")
		{
			self::$instance = new self($db, $host, $user, $password);
		}
	}

?>