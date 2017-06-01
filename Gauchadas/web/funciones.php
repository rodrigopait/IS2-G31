<?php
include("conexion.php");

function comprobarSession(){
	session_start();
	if(!isset($_SESSION['nombreUsuario'])){
		header("location:sign-in.php");
	}
}

?>