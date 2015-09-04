<?php

include "Snoopy.class.php";

$snoopy = new Snoopy;
	$snoopy->maxframes=30;
	$result = $snoopy->fetch("http://www.onlinesbi.com");
//print_r($result);
$html = "hello";
foreach ($result as $tag){ 
echo $tag;
$GLOBALS['html'] = $tag;
//echo $tag;
 }
echo $GLOBALS['html'];

?>