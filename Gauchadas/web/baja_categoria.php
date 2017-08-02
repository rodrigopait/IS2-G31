<?php
include ("funciones.php");
$eliminarCategoria = $_POST['elimina'];
$idCategoria = categoriaGeneral($eliminarCategoria);
 

if( (!empty(existeCategoria($eliminarCategoria))) && ($idCategoria['id_cat'] == 1) ){
		$mensaje = "Las reglas del sistema no permiten dar de baja la categoría General, intételo nuevamente con otra categoría";
}
else{
	if(!empty(existeCategoria($eliminarCategoria))){
		cambiarCategoriaAGeneral($idCategoria['id_cat']);
		borrarCategoria($eliminarCategoria);
		$mensaje = "Se ha realizado con éxito la baja de la categoria " ;
	}
	else{
		$mensaje = "No se puede dar de baja la categoría. La categoría ingresada no existe, intentelo nuevamente.";
	}
}
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'categoria.php'";
echo "</script>";
?>