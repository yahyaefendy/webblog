<?php
	ini_set('display_errors','On');
	error_reporting(E_ALL^E_NOTICE);
	
	session_start();
	require 'connect.php';
	
	$user_check = $_SESSION['email'];

	$result = $link->prepare("SELECT * FROM user WHERE email = :$user_check");
	$result->execute(array(":user_check" => $user_check));
	$row = $result->fetch(PDO::FECTH_ASSOC);

	$login_session = $row['email'];
	$user_id = $row['id'];
	$user_passwords = $row['password'];

	if (!isset($login_session)) {
		$link = null;
		header("location:../../login.php");
	}
?>