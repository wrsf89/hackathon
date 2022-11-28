<?php
	
	$dbhost = 'hyjung95.cafe24.com';
	$dbuser = 'hyjung95';
	$dbpass = 'hyjung95';
	$dbname = 'hyjung95';
	
$dbh = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$selected = mysqli_select_db($dbh, "hyjung95");

	mysqli_query($dbh, "set names utf8");
	
?>
	