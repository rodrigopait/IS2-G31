<?php
include ("funciones.php");
$nuevaCategoria = $_POST['Nueva'];
 
if(empty(existeCategoria($nuevaCategoria))){
	agregarCategoria($nuevaCategoria);
	$mensaje = "Se ha realizado con éxito el alta de la categoria"; 
}
else{
	$mensaje = "No se puede dar de alta la categoría. El titulo que quiere utulizar ya se encuentra en uso.";
}
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'categoria.php'";
echo "</script>";
?>