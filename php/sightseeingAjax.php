<?php
	session_start();
	$variable = $_POST["places"];

	$_SESSION["places"] = $variable;
	header('Content-Type: application/json');
	echo json_encode($variable);
	// header('Content-Type: application/json');
	// print json_encode($_SESSION["places"]);
?>