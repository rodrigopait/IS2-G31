<?php
include ("funciones.php");
$eliminarCategoria = $_POST['elimina'];
 
if(!empty(existeCategoria($eliminarCategoria))){
	borrarCategoria($eliminarCategoria);
	$mensaje = "Se ha realizado con éxito la baja de la categoria";

}
else{
	$mensaje = "No se puede dar de baja la categoría. La categoría ingresada no existe, intentelo nuevamente.";
}
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'categoria.php'";
echo "</script>";
?>