<?php
	require 'Database.php';
	echo "<pre>";
	$db = Database::init('bdenascii');
	$req = Database::$instance->query('SELECT * FROM bds');
	// $res = $db->query("SELECT * FROM bds");
	// var_dump($res);
	echo "</pre>";

	require 'App.php';
	$app = new App();
	$last = $app->getLast()->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BD en ASCII</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-offset-4 col-md-4">
				<div class="pagination">
					<div class="previous"><a href="">&lt; Précédent</a></div>
					<div class="next"><a href="">Suivant &gt;</a></div>
				</div>
				<hr/>
				<div class="bd">
					<div class="titre"><?=$last['title']?></div>
					<div class="content"><img src="<?=$last['file']?>"></div>
				</div>
				<div class="footer">
					<p>
						Created by <a href="http://twitter.com/OzuOsbourne">Ozu Osbourne</a><br/>
						Developed by <a href="http://twitter.com/BenjaminSansNom">Benjamin</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>