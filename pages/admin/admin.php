<?php
	use \Classes\Admin;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-offset-3 col-xs-6">
		<?php
			if(!Admin::isConnected()){

			} else {
				echo "ALREADY CONNECTED";
			}
		?>
		</div>
	</div>
</div>