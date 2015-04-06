<?php
	use \Classes\Admin;
	use \Classes\Bd;
	use \Classes\Alerts;
?>
<?php
	if(Admin::isConnected() && isset($_POST['title']) && isset($_FILES)){
		if(Bd::Add($_POST['title'], $_FILES)){
			Alerts::addAlert("The comic has been poted", "success");
		} else {
			Alerts::addAlert("Error in upload", "danger");
		}
	}
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
<?php
	if(isset($_POST['title']) && isset($_POST['file'])){
		
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
		?>
		</div>
		<?php if(!Admin::isConnected()): ?>
		<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
			<form action="<?=WEBROOT . "admin"?>" method="post" id="login">
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
		</div>
		<?php else: ?>
		<style>
			#imagePreview {
				width: 100%;
				height: 180px;
				background-position: center center;
				background-size: cover;
				-webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
				display: inline-block;
			}
		</style>
		<script>
			$(function() {
				$("#file").on("change", function()
				{
					var files = !!this.files ? this.files : [];
					if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

					if (/^image/.test( files[0].type)){ // only image file
						var reader = new FileReader(); // instance of the FileReader
						reader.readAsDataURL(files[0]); // read the local file

						reader.onloadend = function(){ // set image data as background of div
							$("#imagePreview").css("background-image", "url("+this.result+")");
						}
					}
				});
			});
		</script>
		<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
			<form action="<?=WEBROOT . "admin"?>" method="post" id="add" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Title">Title</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Enter a title for the comic">
				</div>
				
				<div class="form-group">
					<label for="file">Comic</label>
					<input type="file" name="file" id="file">
					<p class="help-block">Image of the comic</p>
					<div id="imagePreview"><p style="margin: 10px">Preview</p></div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<?php endif; ?>
	</div>
</div>