<?php
	use \Classes\Admin;

	if(!Admin::isConnected()){
		echo "NOT CONNECTED";
		$_SESSION['id'] = 1;
	} else {
		echo "ALREADY CONNECTED";
	}
?>