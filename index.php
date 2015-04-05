<?php
	session_start();

	require 'config.php';
	require 'system/autoloader.php';

	use \Classes\Utils;
	use \Classes\Database;
	use \Classes\Bd;
	use \Classes\Parser;

	$db = Database::init($mysql['db'], $mysql['host'], $mysql['user'], $mysql['password']);

	$bd = new Bd();

	$params = Parser::getParams();
	if(isset($params[0])){
		if($params[0] == "admin"){
			$page = "admin/admin";
		} elseif($bd->exists($params[0])){
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
	if(isset($currentBD)){
		$previous = $bd->getPrevious();
		$next = $bd->getNext();
	}

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
		<?php
			include 'pages/' . $page . '.php';
		?>
</body>
</html>