<?php
	use \Classes\Utils;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
			<div class="pagination">
				<div class="row">
					<div class="col-xs-5 previous"><?php echo !empty($previous) ? "<a href='" . WEBROOT . $previous['id'] . "/" . Utils::convertToURL($previous['title']) . "'>&lt; Précédent</a> " : null; ?></div>
					<div class="col-xs-2 home"><a href="<?=WEBROOT?>">Home</a></div>
					<div class="col-xs-5 next"><?php echo !empty($next) ? "<a href='" . WEBROOT . $next['id'] . "/" . Utils::convertToURL($next['title']) . "'>Suivant &gt;</a> " : null; ?></div>
				</div>
			</div>
			<div class="bd">
				<div class="titre"><?=htmlspecialchars($currentBD['title'])?></div>
				<div class="content"><img src="<?=WEBROOT . UPLOAD_DIR . $currentBD['file']?>"></div>
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