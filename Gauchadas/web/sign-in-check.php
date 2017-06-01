<?php
	include("conexion.php");
	include("consultasSQL.php");
	if(isset($_POST['nombreUsuario'])){
		$nombreUsuario = $_POST['nombreUsuario'];
		$password = $_POST['pw'];
		$res = obtenerUsuario($nombreUsuario,$password);
		if(!$res['id_usuario']){
			$mensaje = "El nombre de usuario o contraseña es incorrecto! Por favor pruebe con uno diferente";
			echo "<script>";
			echo "alert('$mensaje');";
			echo "window.location = 'sign-in.php'";
			echo "</script>";
		}
		else{
			$consulta_usuario = consultaUsuario($res['id_usuario']);
			session_start();
			$_SESSION['id_usuario'] = $res['id_usuario'];
			$_SESSION['nombreUsuario'] = $nombreUsuario;
			$_SESSION['tipo_adm'] = $consulta_usuario['tipo_adm'];
			header("location:index.php");
		}	
	}
?>