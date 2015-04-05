<?php
	use \Classes\Admin;
	use PFBC\Form;
	use PFBC\Element;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-offset-3 col-xs-6">
		<?php
				$form = new Form("login");

				$form->addElement(new Element\HTML('<legend>Connexion</legend>'));
				$form->addElement(new Element\Hidden("form", "login"));
				$form->addElement(new Element\Email("Username:", "username", array(
				    "required" => 1
				)));
				$form->addElement(new Element\Password("Password:", "Password", array(
				    "required" => 1
				)));
				$form->addElement(new Element\Checkbox("", "Remember", array(
				    "1" => "Remember me"
				)));
				$form->addElement(new Element\Button("Login"));
				$form->render();

			if(!Admin::isConnected()){
			} else {
				echo "ALREADY CONNECTED";
			}
		?>
		</div>
	</div>
</div>