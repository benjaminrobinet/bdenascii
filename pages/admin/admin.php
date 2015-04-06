<?php
	use \Classes\Admin;
	use \Classes\Alerts;
?>

<?php 
	if(isset($_POST['username']) && isset($_POST['password'])){
		if(Admin::isAdmin($_POST['username'], $_POST['password'])){
			$_SESSION['id'] = Admin::$id;
			$_SESSION['username'] = Admin::$username;
			Alerts::addAlert("You are now connected", "success");
		} else {
			Alerts::addAlert("Error: Verify your identifiants", "danger");
		}
	}
?>
<div class="top-buffer"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
		<?php
			

			foreach (Alerts::$alerts as $alert) {
					echo Alerts::makeAlert($alert['alert'], $alert['type']);
			}

			
			if(!Admin::isConnected()){
				?>
				<form action="<?=WEBROOT . "admin"?>" method="post" name="login" id="login">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="**********">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<?php
			}
		?>
		</div>
	</div>
</div>