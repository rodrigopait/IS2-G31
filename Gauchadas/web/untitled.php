<?php

$rango_min = $_POST['rango_min'];
$rango_max = $_POST['rango_max'];
$titulo = $_POST['titulo'];

if ( ($rango_min > 0) && ($rango_max > 0) ){
	$queryExiste = mysql_query("SELECT * FROM reputacion WHERE rango_min = '$rango_min' AND rango_max = '$rango_max'");
	$existe = mysql_fetch_array($queryExiste);
	if ( empty($existe) ){
			// $queryTupla = mysql_query("SELECT * FROM reputacion WHERE ((rango_min <= '$rango_min') AND (rango_max >= '$rango_min')) ");
			// $tupla = mysql_fetch_array($queryTupla);
			// $id_original = $tupla['id_rep'];
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
				$auxMax = $rango_max + 1;
				mysql_query("UPDATE reputacion SET rango_max = '$auxMin' WHERE id_rep = '$id' ");
				$query2 = mysql_query("SELECT * FROM reputacion WHERE rango_min = '$aux'");
				$request2 = mysql_fetch_array($query2);
				$id = $request2['id_rep'];
				mysql_query("UPDATE reputacion SET rango_min = '$auxMax' ");
				insertarReputacion($rango_min, $rango_max,$titulo);
			}
		}
		else {
			$query1 = mysql_query("SELECT * FROM reputacion WHERE rango_min > '$rango_min' AND rango_max < '$rango_max' ");
			$request1 = mysql_fetch_array($query1);
			if (!empty($request1)){
				$q = mysql_query("SELECT * FROM reputacion WHERE rango_min > '$rango_min' AND rango_max < '$rango_max' ");
				while ($r = mysql_fetch_array($q)) {
					$id = $r['id_rep'];
					mysql_query("DELETE FROM reputacion WHERE id_rep = 'id' ");
				}
			}
			$query2 = mysql_query("SELECT * FROM reputacion WHERE rango_min <= '$rango_min' AND rango_max >= '$rango_min' ");
			$request2 = mysql_fetch_array($query2);
			$id = $request2['id_rep'];
			$aux = $request2['rango_max'];
			$auxMin = $rango_min - 1;
			$auxMax = $rango_max + 1;
			mysql_query("UPDATE reputacion SET rango_max = '$auxMin' WHERE id_rep = '$id' ");
			$query3 = mysql_query("SELECT * FROM reputacion WHERE rango_min = '$aux'");
			$request3 = mysql_fetch_array($query3);
			$id = $request3['id_rep'];
			mysql_query("UPDATE reputacion SET rango_min = '$auxMax' ");
			insertarReputacion($rango_min, $rango_max,$titulo);
		}
	}
	else{
		echo "No se puede dar de alta la reputacion. El rango que ingreso ya se encuentra utilizado";
	}
}
else {
	echo "No se puede dar de alta la reputacion. Alguno de los elementos ingresados son negativos";
}

1-1 
	rango_min = max + 1
	inserto el 1-1

3-3 
	auxMax = rango_max
	rango_max = min - 1 
	if (rango_min = auxMax + 1){ "Recorro la reputacion"
		rango_min = max + 1
	}
	inserto 3-3

3-5 
	auxMax = rango_max
	rango_max = min -1
	if (rango_min = auxMax + 1){ "Recorro la reputacion"
		rango_min = max + 1
	}
	inserto 3-5

10-10
	"Lo mismo que con 3-5"

4-10
	"Lo mismo que con 3-5"

1-15		
	la tupla que contiene el min
		rango_max = min - 1
	la tupla que contiene el max
		rango_min = max + 1

5-25
	traer las tuplas WHERE min < rango_min AND max > rango_max
	if (!empty($query)){
		borrar todas las tuplas
	}
	realizar lo de 1-15
