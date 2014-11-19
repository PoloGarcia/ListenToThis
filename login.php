<?php

	session_start();
	include("php/util.php");

	if(authenticate($_POST['user'], $_POST['password'])) {
		$_SESSION['user'] = $_POST['user'];
		$_SESSION['password'] = $_POST['password'];
		header('Location: admin.html');
	} else {
		echo "Credenciales incorrectas";
	}


?>