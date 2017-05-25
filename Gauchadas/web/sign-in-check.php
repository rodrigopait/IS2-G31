<?php
	include("conexion.php");
	include("consultasSQL.php");
	if(isset($_POST['nombreUsuario'])){
		$nombreUsuario = $_POST['nombreUsuario'];
		$password = $_POST['pw'];
		$res = obtenerUsuario($nombreUsuario,$password);
		if(!$res['id_usuario']){
			header("location:sign-in.php");
		}
		else{
			session_start();
			$_SESSION['id_usuario'] = $res['id_usuario'];
			$_SESSION['nombreUsuario'] = $nombreUsuario;
			header("location:index.php");
		}	
	}
	session_start();
	if(!isset($_SESSION['nombreUsuario'])){
		header("location:sign-in.php");
	}
?>