<?php
	namespace Classes;

	/**
	* Alerts maker
	*/
	class Alerts
	{

		public static $alerts = array();

		public static function addAlert($alert, $type = "info")
		{
			self::$alerts[] = array("alert" => $alert, "type" => $type);
			return $alert;
		}

		public static function makeAlert($alert, $type)
		{
			$html = '<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						' . $alert . '
					</div>';
			return $html;
		}
	}
?>