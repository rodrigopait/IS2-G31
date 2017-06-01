<?php
include("conexion.php");
include("consultasSQL.php");

function comprobarSession(){
	session_start();
	if(!isset($_SESSION['nombreUsuario'])){
		header("location:sign-in.php");
	}
}

function mostrarMensajeErrorCreditos($id_usuario){
	$consultaCreditos = cantCreditos($id_usuario);
	if ($consultaCreditos['creditos'] < 1){
		echo "<h4 style='color:#f20202';>No posee creditos suficientes para publicar una Gauchada</h4>";
	}
}

?>