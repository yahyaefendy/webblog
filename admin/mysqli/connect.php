<?php 
	ini_set('display_errors', 'On');
	error_reporting(E_ALL^E_NOTICE);
    
	$link = new mysqli('localhost','root','sayait','mediablog');

	if ($link->connect_errno) {
		echo "Connection Failed".$link->connect_errno;
	}
?>