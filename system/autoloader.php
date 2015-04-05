<?php
	function __autoload($classname){
		$classname = str_replace("Classes\\", '', $classname);
		require 'class/' . $classname . ".php";
	}
?>