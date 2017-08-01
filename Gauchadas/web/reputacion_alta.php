<?php
include ("funciones.php");
$rango_min = $_POST['rango_min'];
$rango_max = $_POST['rango_max'];
$titulo = $_POST['titulo'];

$consulta = mysql_query("SELECT * FROM reputacion WHERE descripcion = '$titulo' ");
$consultaTitulo = mysql_fetch_array($consulta);
if (empty($consultaTitulo)){
	if ( ($rango_min > 0) && ($rango_max > 0) ){
		$queryExiste = mysql_query("SELECT * FROM reputacion WHERE rango_min = '$rango_min' AND rango_max = '$rango_max'");
		$existe = mysql_fetch_array($queryExiste);
		if ( empty($existe) ){
			if ($rango_min == $rango_max){
				$queryIgualMin = mysql_query("SELECT * FROM reputacion WHERE rango_min = '$rango_min'");
				$igualMin = mysql_fetch_array($queryIgualMin);
				if (!empty($igualMin)){
					$id = $igualMin['id_rep'];
					$auxRangoMax =  $rango_max + 1;
					mysql_query("UPDATE reputacion SET rango_min = '$auxRangoMax' WHERE id_rep = '$id' ");
					insertarReputacion($rango_min, $rango_max,$titulo);
				}
				else {
					$query1 = mysql_query("SELECT * FROM reputacion WHERE rango_min <= '$rango_min' AND rango_max >= '$rango_min' ");
					$request1 = mysql_fetch_array($query1);
					$id = $request1['id_rep'];
					$aux = $request1['rango_max'];
					$auxMin = $rango_min - 1;
					$auxRangoMax = $rango_max + 1;
					$auxMax = $aux + 1;
					mysql_query("UPDATE reputacion SET rango_max = '$auxMin' WHERE id_rep = '$id' ");
					mysql_query("UPDATE reputacion SET rango_min = '$auxRangoMax' WHERE rango_min = '$auxMax' ");
					insertarReputacion($rango_min, $rango_max,$titulo);
				}
			}
			else {
				$consulta = mysql_query("SELECT * FROM reputacion WHERE rango_min <= '$rango_min' AND rango_max >= '$rango_max' ");
				if ( 1 == mysql_num_rows($consulta)){
					$tupla = mysql_fetch_array($consulta);
					$proximo = $tupla['rango_max'] + 1;
					$anterior = $tupla['rango_min'] - 1;
					$id = $tupla['id_rep'];
					$newMinAnt = $rango_min - 1;
					$newMaxProx = $rango_max + 1;
					$funcion = calcularTablaAModifcar($rango_min,$rango_max,$tupla['rango_min'],$tupla['rango_max']);
					if ($funcion == $rango_min){
						mysql_query("UPDATE reputacion SET rango_max = '$newMinAnt' WHERE rango_max = '$anterior' ");
						mysql_query("UPDATE reputacion SET rango_min = '$newMaxProx' WHERE id_rep = '$id' ");
					}
					else {
						mysql_query("UPDATE reputacion SET rango_min = '$newMaxProx' WHERE rango_min = '$proximo' ");
						mysql_query("UPDATE reputacion SET rango_max = '$newMinAnt' WHERE id_rep = '$id' ");	
					}
					insertarReputacion($rango_min,$rango_max,$titulo);
				}
				else {
					$query1 = mysql_query("SELECT * FROM reputacion WHERE rango_min >= '$rango_min' AND rango_max <= '$rango_max' ");
					$request1 = mysql_fetch_array($query1);
					if (!empty($request1)){
						$q = mysql_query("SELECT * FROM reputacion WHERE rango_min >= '$rango_min' AND rango_max <= '$rango_max' ");
						while ($r = mysql_fetch_array($q)) {
							$id = $r['id_rep'];
							mysql_query("DELETE FROM reputacion WHERE id_rep = '$id' ");
						}
					}
					$query2 = mysql_query("SELECT * FROM reputacion WHERE rango_min <= '$rango_min' AND rango_max >= '$rango_min' ");
					$request2 = mysql_fetch_array($query2);
					$id = $request2['id_rep'];
					$aux = $request2['rango_max'];
					$auxMin = $rango_min - 1;
					$auxMax = $rango_max + 1;
					mysql_query("UPDATE reputacion SET rango_max = '$auxMin' WHERE id_rep = '$id' ");
					$query3 = mysql_query("SELECT * FROM reputacion WHERE rango_min <= '$rango_max' AND rango_max >= '$rango_max' ");
					$request3 = mysql_fetch_array($query3);
					$id = $request3['id_rep'];
					mysql_query("UPDATE reputacion SET rango_min = '$auxMax' WHERE id_rep = '$id' ");
					insertarReputacion($rango_min, $rango_max,$titulo);
				}
			}
			$mensaje = "Se ha realizado con exito el alta de la reputacion";
		}
		else{
			$mensaje = "No se puede dar de alta la reputacion. El rango que ingreso ya se encuentra utilizado";
		}
	}
	else {
		$mensaje = "No se puede dar de alta la reputacion. Alguno de los elementos ingresados son negativos";
	}
}
else {
	$mensaje = "No se puede dar de alta la reputacion. El titulo que quiere utulizar ya se encuentra en uso.";
}
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'reputacion.php'";
echo "</script>";

?>