<?php
	function __autoload($classname){
		$classname = str_replace("Classes\\", '', $classname);
		require_once 'class/' . $classname . ".php";
	}
?>