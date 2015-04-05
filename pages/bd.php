<?php
	use \Classes\Utils;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-offset-4 col-md-4">
			<div class="pagination">
				<div class="row">
					<div class="col-xs-4 previous"><?php echo !empty($previous) ? "<a href='" . WEBROOT . $previous['id'] . "/" . Utils::convertToURL($previous['title']) . "'>&lt; Précédent</a> " : null; ?></div>
					<div class="col-xs-4 home"><a href="<?=WEBROOT?>">Home</a></div>
					<div class="col-xs-4 next"><?php echo !empty($next) ? "<a href='" . WEBROOT . $next['id'] . "/" . Utils::convertToURL($next['title']) . "'>Suivant &gt;</a> " : null; ?></div>
				</div>
			</div>
			<div class="bd">
				<div class="titre"><?=$currentBD['title']?></div>
				<div class="content"><img src="<?=WEBROOT . $currentBD['file']?>"></div>
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