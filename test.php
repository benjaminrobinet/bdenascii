<?php
$str = 'oziefiozef.png';
$convert = "oziefiozefpng";
// $str = strrchr($str, ".");
$str = substr(strrchr($str, "."), 1);
$size = strlen($str):
$filename = substr($convert, 0, - $size);
?>