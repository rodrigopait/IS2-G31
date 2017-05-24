<?php 
include("conexion.php");
session_start();
if (isset($_SESSION['nombreUsuario'])){
	session_destroy();
}
header("location: sign-in.php");
?>