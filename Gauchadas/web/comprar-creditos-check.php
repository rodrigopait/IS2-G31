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
	$vencimiento = $_POST['vencimiento'];
	$agregarDetalle  = agregarDetalleCompra($total,$vencimiento,$cantCreditos,$idCredito,$idUsuario);
	if (!$agregarDetalle){
		$mensaje = "La compra no se pudo realizar! Intente de nuevo";
		echo "<script>";
		echo "alert('$mensaje');";
		echo "window.location = 'comprar-creditos.php'";
		echo "</script>";
	}
	else {
		$mensaje = "La compra fue registrada correctamente!";
		echo "<script>";
		echo "alert('$mensaje');";
		echo "window.location = 'index.php'";
		echo "</script>";
	}
}
?>