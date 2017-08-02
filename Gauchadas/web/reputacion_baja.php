<?php 
include("funciones.php");
$id_original = $_GET['id_rep'];
$consulta =  mysql_query("SELECT * FROM reputacion WHERE id_rep = '$id_original'");
$original = mysql_fetch_array($consulta);
$rango_min_ori = $original['rango_min'];
$rango_max_ori = $original['rango_max'];
$anterior = $rango_min_ori - 1;
$proximo = $rango_max_ori + 1;

if ($rango_min_ori == 1){
	mysql_query("UPDATE reputacion SET rango_min = '$rango_min_ori' WHERE rango_min = '$proximo' ");
	eliminarTupla($id_original);
}
else {
	if ( $rango_max_ori == 9999999 ){
		mysql_query("UPDATE reputacion SET rango_max = '$rango_max_ori' WHERE rango_max = '$anterior' ");
		eliminarTupla($id_original);
	}
	else {
		mysql_query("UPDATE reputacion SET rango_min = '$rango_min_ori' WHERE rango_min = '$proximo' ");
		eliminarTupla($id_original);
	}
}
$mensaje = "Se ha realizado con exito la eliminacion de la reputacion.";
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'reputacion.php'";
echo "</script>";
?>