<?php
	include "menu.php";
	$userName = $_POST['userName'];
	$comment = $_POST['comment'];	
	$postToComment = $_POST['postToComment'];
	$commentRate = $_POST['commentType'];
	date_default_timezone_set("Poland");
	$date = date("Y-m-d");
	$time = date("H:i:s");	

	if (!(file_exists($postToComment.".k"))) {
       mkdir($postToComment.".k", 0755);
	}

	$comNumber = 0;
	$stringCastComNumber = sprintf("%d",$comNumber);
	while (file_exists($postToComment.".k/".$stringCastComNumber)) {
		$comNumber = $comNumber + 1;
		$stringCastComNumber = sprintf("%d",$comNumber);
	}

	$pathToAdd = $postToComment.".k/".$stringCastComNumber;

	$file = fopen($pathToAdd,"w");
	fwrite($file,$userName."\n".$comment."\n".$commentRate."\n".$date."(".$time.")"."\n");
	fclose($file);
?>
