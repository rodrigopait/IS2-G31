<?php
include ("funciones.php");
$rango_min = $_POST['rango_min'];
$rango_max = $_POST['rango_max'];
$titulo = $_POST['titulo'];
$id_original = $_GET['id'];
$consultaOriginal = mysql_query("SELECT * FROM reputacion WHERE id_rep = '$id' ");
$original = mysql_fetch_array($consultaOriginal);
$rango_min_ori = $original['rango_min'];
$rango_max_ori = $original['rango_max'];
$titulo_original = $original['descripcion'];

$consulta = mysql_query("SELECT * FROM reputacion WHERE descripcion = '$titulo' AND id_rep != '$id_original' ");
$consultaTitulo = mysql_fetch_array($consulta);
if (empty($consultaTitulo)){
	if ( ($rango_min > 0) && ($rango_max > 0) ){
		$queryExiste = mysql_query("SELECT * FROM reputacion WHERE rango_min = '$rango_min' AND rango_max = '$rango_max'");
		$existe = mysql_fetch_array($queryExiste);
		if ( empty($existe) ){
			if ($titulo_original != $titulo) {
				modificarReputacion($rango_min_ori,$rango_max_ori,$titulo,$id_original);
				if ($rango_min_ori != $rango_min){
					if ($rango_max_ori != $rango_max){
						moficar maximo y minimo 
					}
					else {
						//modificar solo el minimo
						if ( ($rango_min_ori -1 ) == 0 ){
							$mensaje = "No se puede modificar la reputacion. La tabla no puede quedar inconsistente";
							echo "<script>";
							echo "alert('$mensaje');";
							echo "window.location = 'reputacion_modificar.php?id_rep=".$id_original."'";
							echo "</script>";
						}
						else {
							$anterior = $rango_min_ori - 1;
							$nuevoRango = $rango_min - 1 ;
							mysql_query("UPDATE reputacion SET rango_max = '$nuevoRango' WHERE rango_max = '$anterior' ");
							modificarReputacion($rango_min,$rango_max_ori,$titulo_original,$id_original);
						}
					}	
				}
				else {
					if ($rango_max_ori != $rango_max){
						modificar  solo el maximo
						
					}
				}
			}
			else {
				if ($rango_min_ori != $rango_min){
					if ($rango_max_ori != $rango_max){
						moficar maximo y minimo
					}
					else {
						//modificar solo el minimo
						if ( ($rango_min_ori -1 ) == 0 ){
							$mensaje = "No se puede modificar la reputacion. La tabla no puede quedar inconsistente";
							echo "<script>";
							echo "alert('$mensaje');";
							echo "window.location = 'reputacion_modificar.php?id_rep=".$id_original."'";
							echo "</script>";
						}
						else {
							$anterior = $rango_min_ori - 1;
							$nuevoRango = $rango_min - 1 ;
							mysql_query("UPDATE reputacion SET rango_max = '$nuevoRango' WHERE rango_max = '$anterior' ");
							modificarReputacion($rango_min,$rango_max_ori,$titulo_original,$id_original);
						}
					}
				}
				else {
					if ($rango_max_ori != $rango_max){
						modificar  solo el maximo
					}
				}
			}
			$mensaje = "Se ha realizado con exito el alta de la reputacion";
			echo "<script>";
			echo "alert('$mensaje');";
			echo "window.location = 'reputacion.php'";
			echo "</script>";
		}
		else{
			$mensaje = "No se puede modificar la reputacion. El rango que ingreso ya se encuentra utilizado";
			echo "<script>";
			echo "alert('$mensaje');";
			echo "window.location = 'reputacion_modificar.php?id_rep=".$id_original."'";
			echo "</script>";
		}
	}
	else {
		$mensaje = "No se puede modificar la reputacion. Alguno de los elementos ingresados son negativos";
		echo "<script>";
		echo "alert('$mensaje');";
		echo "window.location = 'reputacion_modificar.php?id_rep=".$id_original."'";
		echo "</script>";
	}
}
else {
	$mensaje = "No se puede modificar la reputacion. El titulo que quiere utulizar ya se encuentra en uso.";
	echo "<script>";
	echo "alert('$mensaje');";
	echo "window.location = 'reputacion_modificar.php?id_rep=".$id_original."'";
	echo "</script>";
}
?>