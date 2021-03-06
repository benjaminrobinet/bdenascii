<?php
	namespace Classes;

	/**
	* URL Parser for the Router (also for MVC)
	*/
	class Parser
	{

		public static function getURL()
		{
			$url = isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
			return $url;
		}

		public static function getParams($url = null)
		{
			# Get url
			$url = parse_url(self::getURL(), PHP_URL_PATH);

			# Parse the URL to only keep params
			if(WEBROOT != "/"){
				$url = str_replace(WEBROOT, "", $url);
			} else {
				$url = substr($url, 1);
			}

			# Split the parsed URL to get params
			$params = explode("/", $url);
			$params = !empty($params[0]) ? $params : NULL;

			return $params;
		}
	}
?>