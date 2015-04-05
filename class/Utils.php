<?php
	namespace Classes;

	/**
	* Utils
	*/
	class Utils
	{
		public static function convertToURL($str)
		{
			$str = htmlentities($str, ENT_NOQUOTES, 'utf-8');
			$str = preg_replace('#&([A-Za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
			$str = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $str));
			return strtolower(preg_replace('/-+/', '-', $str));
		}
	}
?>