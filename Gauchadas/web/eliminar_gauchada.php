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

?>