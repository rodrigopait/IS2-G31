<?php
include ("funciones.php");
$rango_min = $_POST['rango_min'];
$rango_max = $_POST['rango_max'];
$titulo = $_POST['titulo'];
$id_original = $_GET['id'];
$consultaOriginal = mysql_query("SELECT * FROM reputacion WHERE id_rep = '$id_original' ");
$original = mysql_fetch_array($consultaOriginal);
$rango_min_ori = $original['rango_min'];
$rango_max_ori = $original['rango_max'];
$titulo_original = $original['descripcion'];

$consulta = mysql_query("SELECT * FROM reputacion WHERE descripcion = '$titulo' AND id_rep != '$id_original' ");
$consultaTitulo = mysql_fetch_array($consulta);
if (empty($consultaTitulo)){
	if ($titulo != $titulo_original){
		modificarReputacion($rango_min_ori,$rango_max_ori,$titulo,$id_original);
		$consulta = mysql_query("SELECT * FROM reputacion WHERE rango_min = '$rango_min' AND rango_max = '$rango_max' ");
		$tabla = mysql_fetch_array($consulta);
		if (empty($tabla)){
			echo "entro";
			if ($rango_min != $rango_min_ori){
				if ($rango_max != $rango_max_ori){ //modificar el maximo y el minimo
					$consultaMedio = mysql_query("SELECT * FROM reputacion WHERE rango_min >= '$rango_min' AND rango_max <= '$rango_max' ");
					$medio = mysql_fetch_array($consultaMedio);
					if (empty($medio)){//no hay tuplas en el medio es una modificacion normal
						$anterior = $rango_min_ori - 1;
						$nuevoRangoMin = $rango_min - 1;
						$proximo = $rango_max_ori + 1;
						$nuevoRangoMax = $rango_max + 1;
						mysql_query("UPDATE reputacion SET rango_max = '$nuevoRangoMin' WHERE rango_max = '$anterior' ");
						mysql_query("UPDATE reputacion SET rango_min = '$nuevoRangoMax' WHERE rango_min = '$proximo' ");
						modificarReputacion($rango_min,$rango_max,$titulo_original,$id_original);
					}
					else { //hay tuplas en el medio
						if ($medio['id_rep'] == $id_original){
							$anterior = $rango_min_ori - 1;
							$nuevoRangoMin = $rango_min - 1;
							$proximo = $rango_max_ori + 1;
							$nuevoRangoMax = $rango_max + 1;
							mysql_query("UPDATE reputacion SET rango_max = '$nuevoRangoMin' WHERE rango_max = '$anterior' ");
							mysql_query("UPDATE reputacion SET rango_min = '$nuevoRangoMax' WHERE rango_min = '$proximo' ");
							modificarReputacion($rango_min,$rango_max,$titulo_original,$id_original);
						}
						else { //fijarse si hay una sola tupla o mas, como dejar la BD consistente
							$consul = mysql_query("SELECT * FROM reputacion WHERE rango_min > '$rango_min' AND rango_max < '$rango_max' ");
							while ($tupla = mysql_fetch_array($consul)) {
								eliminarTupla($tupla['id_rep']);
							}
							$anterior = $rango_min - 1;
							$proximo = $rango_max + 1;
							mysql_query("UPDATE reputacion SET rango_max = '$anterior' WHERE rango_min < '$rango_min' AND rango_max >= '$rango_min' ");
							mysql_query("UPDATE reputacion SET rango_min = '$proximo' WHERE rango_min <= '$proximo' AND rango_max > '$proximo' ");
							modificarReputacion($rango_min,$rango_max,$titulo_original,$id_original);
						}
					}
				}
				else { //modificar solo el minimo
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
				$mensaje = "Se ha realizado con exito la modificacion de el/los rango/s de la reputacion";
				echo "<script>";
				echo "alert('$mensaje');";
				echo "window.location = 'reputacion.php'";
				echo "</script>";
			}
			else {
				if ($rango_max != $rango_max_ori){ //modificar solo el maximo
					if ($rango_max_ori == 9999999 ) {
						$mensaje = "No se puede modificar la reputacion. La tabla no puede quedar inconsistente";
						echo "<script>";
						echo "alert('$mensaje');";
						echo "window.location = 'reputacion_modificar.php?id_rep=".$id_original."'";
						echo "</script>";
					}
					else {
						$proximo = $rango_max_ori + 1;
						$nuevoRango = $rango_max + 1;
						mysql_query("UPDATE reputacion SET rango_min = '$nuevoRango' WHERE rango_min = '$proximo' ");
						modificarReputacion($rango_min_ori,$rango_max,$titulo_original,$id_original);
					}
					$mensaje = "Se ha realizado con exito la modificacion de la reputacion";
					echo "<script>";
					echo "alert('$mensaje');";
					echo "window.location = 'reputacion.php'";
					echo "</script>";
				}
			}
		}
		else {
			if ($titulo != $titulo_original){
				$mensaje = "Se ha realizado con exito la modificacion del nombre de la reputacion";
				echo "<script>";
				echo "alert('$mensaje');";
				echo "window.location = 'reputacion.php'";
				echo "</script>";
			}
			else {
				$mensaje = "No se puede modificar la reputacion. El rango que ingreso ya se encuentra utilizado";
				echo "<script>";
				echo "alert('$mensaje');";
				echo "window.location = 'reputacion_modificar.php?id_rep=".$id_original."'";
				echo "</script>";
			}
		}
	}
	else {
		$consulta = mysql_query("SELECT * FROM reputacion WHERE rango_min = '$rango_min' AND rango_max = '$rango_max' ");
		$tabla = mysql_fetch_array($consulta);
		if (empty($tabla)){
			if ($rango_min != $rango_min_ori){
				if ($rango_max != $rango_max_ori){ //modificar el maximo y el minimo
					$consultaMedio = mysql_query("SELECT * FROM reputacion WHERE rango_min >= '$rango_min' AND rango_max <= '$rango_max' ");
					$medio = mysql_fetch_array($consultaMedio);
					if (empty($medio)){//no hay tuplas en el medio es una modificacion normal
						$anterior = $rango_min_ori - 1;
						$nuevoRangoMin = $rango_min - 1;
						$proximo = $rango_max_ori + 1;
						$nuevoRangoMax = $rango_max + 1;
						mysql_query("UPDATE reputacion SET rango_max = '$nuevoRangoMin' WHERE rango_max = '$anterior' ");
						mysql_query("UPDATE reputacion SET rango_min = '$nuevoRangoMax' WHERE rango_min = '$proximo' ");
						modificarReputacion($rango_min,$rango_max,$titulo_original,$id_original);
					}
					else { //hay tuplas en el medio
						if ($medio['id_rep'] == $id_original){
							$anterior = $rango_min_ori - 1;
							$nuevoRangoMin = $rango_min - 1;
							$proximo = $rango_max_ori + 1;
							$nuevoRangoMax = $rango_max + 1;
							mysql_query("UPDATE reputacion SET rango_max = '$nuevoRangoMin' WHERE rango_max = '$anterior' ");
							mysql_query("UPDATE reputacion SET rango_min = '$nuevoRangoMax' WHERE rango_min = '$proximo' ");
							modificarReputacion($rango_min,$rango_max,$titulo_original,$id_original);
						}
						else { //fijarse si hay una sola tupla o mas, como dejar la BD consistente
							$consul = mysql_query("SELECT * FROM reputacion WHERE rango_min > '$rango_min' AND rango_max < '$rango_max' ");
							while ($tupla = mysql_fetch_array($consul)) {
								eliminarTupla($tupla['id_rep']);
							}
							$anterior = $rango_min - 1;
							$proximo = $rango_max + 1;
							mysql_query("UPDATE reputacion SET rango_max = '$anterior' WHERE rango_min < '$rango_min' AND rango_max >= '$rango_min' ");
							mysql_query("UPDATE reputacion SET rango_min = '$proximo' WHERE rango_min <= '$proximo' AND rango_max > '$proximo' ");
							modificarReputacion($rango_min,$rango_max,$titulo_original,$id_original);
						}
					}
				}
				else { //modificar solo el minimo
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
				$mensaje = "Se ha realizado con exito la modificacion de la reputacion";
				echo "<script>";
				echo "alert('$mensaje');";
				echo "window.location = 'reputacion.php'";
				echo "</script>";
			}
			else {
				if ($rango_max != $rango_max_ori){ //modificar solo el maximo
					if ($rango_max_ori == 9999999 ) {
						$mensaje = "No se puede modificar la reputacion. La tabla no puede quedar inconsistente";
						echo "<script>";
						echo "alert('$mensaje');";
						echo "window.location = 'reputacion_modificar.php?id_rep=".$id_original."'";
						echo "</script>";
					}
					else {
						$proximo = $rango_max_ori + 1;
						$nuevoRango = $rango_max + 1;
						mysql_query("UPDATE reputacion SET rango_min = '$nuevoRango' WHERE rango_min = '$proximo' ");
						modificarReputacion($rango_min_ori,$rango_max,$titulo_original,$id_original);
					}
					$mensaje = "Se ha realizado con exito la modificacion de la reputacion";
					echo "<script>";
					echo "alert('$mensaje');";
					echo "window.location = 'reputacion.php'";
					echo "</script>";
				}
			}
		}
		else {
			$mensaje = "No se puede modificar la reputacion. El rango que ingreso ya se encuentra utilizado";
			echo "<script>";
			echo "alert('$mensaje');";
			echo "window.location = 'reputacion_modificar.php?id_rep=".$id_original."'";
			echo "</script>";
		}
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