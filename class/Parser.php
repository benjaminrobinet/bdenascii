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
			$parsedurl = str_replace(WEBROOT, "", $url);
			
			# Split the parsed URL to get params
			$params = split("/", $parsedurl);
			$params = !empty($params[0]) ? $params : NULL;

			return $params;
		}
	}
	// $request = str_replace(WEBROOT, "", $_SERVER['REQUEST_URI']);

	// $params = split("/", $request);
	// $params = !empty($params[0]) ? $params : NULL;
?>