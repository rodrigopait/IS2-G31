<?php
include ("funciones.php");
$modificar = $_POST['modifica'];
$categoria = $_POST['categoria_vieja'];
 
if(!empty(existeCategoria($categoria))){
	updateCategoria($categoria, $modificar);
	$mensaje = "Se ha realizado con éxito la modificación de la categoria";

}
else{
	$mensaje = "No se puede modificar la categoría. La categoría ingresada no existe, intentelo nuevamente.";
}
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'categoria.php'";
echo "</script>";
?>