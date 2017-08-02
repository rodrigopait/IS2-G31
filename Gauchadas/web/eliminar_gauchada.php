<?php
include("conexion.php");
include("funciones.php");
session_start();
$id_gauchada = $_GET['id_gauchada'];
eliminarGauchada($id_gauchada);
$mensaje = "La gauchada ha sido eliminada! ";
	echo "<script>";
	echo "alert('$mensaje');";
	echo "window.location = 'misgauchadas.php'";
	echo "</script>";

/* if( 0 != consultaAdeudada($_SESSION['id_usuario'])){
	$mensaje = "Usted adeuda calificaciones, no se puede eliminar la gauchada! ";
				echo "<script>";
				echo "alert('$mensaje');";
				echo "window.location = 'misgauchadas.php'";
				echo "</script>";
} 
else{
	if( 0 != postuldo($_GET['$id_gauchada'])){
		$mensaje = "Esta gauchada tiene usuarios postulados, no se puede eliminar! ";
				echo "<script>";
				echo "alert('$mensaje');";
				echo "window.location = 'misgauchadas.php'";
				echo "</script>";
	}
	else{
		$id_gauchada = $_GET['id_gauchada'];
	eliminarGauchada($id_gauchada);
	$mensaje = "La gauchada ha sido eliminada! ";
				echo "<script>";
				echo "alert('$mensaje');";
				echo "window.location = 'misgauchadas.php'";
				echo "</script>";	
	}
}*/
?>