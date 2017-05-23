<?php
	session_start();
	if($_SESSION['nombreUsuario']){
		session_destroy();
	}
	header("location:sign-in.php");
?>