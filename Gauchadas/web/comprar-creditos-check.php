<?php
include ("conexion.php");
include ("consultasSQL.php");
session_start();
if(isset($_POST['cantCreditos'])){
	$res = cantCreditos($_SESSION['nombreUsuario']);
	$idUsuario = $_SESSION['id_usuario'];
	$cantCreditos = $_POST['cantCreditos'];
	$cantCreditos = $cantCreditos + $res['creditos'];
	$actualizar = comprarCreditos($cantCreditos,$idUsuario);
	$cantCreditos = $_POST['cantCreditos'];
	$valorCredito = valorPorCredito();
	$total = $valorCredito['valor'] * $cantCreditos;
	$idCredito = $valorCredito['id_credito'];
	$agregarDetalle  = agregarDetalleCompra($total,$cantCreditos,$idCredito,$idUsuario);
	$mensaje = "La compra fue registrada correctamente!";
			echo "<script>";
			echo "alert('$mensaje');";
			echo "window.location = 'index.php'";
			echo "</script>";
}
?>