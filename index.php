<?php
	require 'config.php';
	require 'class/Utils.php';

	require 'class/Database.php';
	$db = Database::init('bdenascii');

	require 'class/Bd.php';
	$bd = new Bd();

	echo "<pre>";
	echo "</pre>";

	require 'class/Parser.php';
	$params = Parser::getParams();
	if(isset($params[0])){
		if($bd->exists($params[0])){
			$page = "bd";
			$currentBD = $bd->getById($params[0]);
			$bd->setCurrent($params[0]);
		} else {
			$page = "404";
		}
	} else {
		$page = "bd";
		$currentBD = $bd->getLast();
		$bd->setCurrent($currentBD['id']);
	}

	echo "<pre>";
	echo "</pre>";
	$previous = $bd->getPrevious();
	$next = $bd->getNext();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BD en ASCII</title>
	<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>css/style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php
				include 'pages/' . $page . '.php';
			?>
		</div>
	</div>
</body>
</html>