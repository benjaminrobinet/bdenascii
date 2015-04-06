<?php 
	define('WEBROOT', str_replace("index.php", "", $_SERVER['SCRIPT_NAME']));

	define('UPLOAD_DIR', "bds/");
	$mysql = array(
			"db" => "bdenascii",
			"host" => "localhost",
			"user" => "root",
			"password" => ""
		);
?>