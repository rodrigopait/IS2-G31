<?php
include ("funciones.php");
$modificar = $_POST['modifica'];
$categoria = $_POST['categoria_vieja'];
$idCategoria = categoriaGeneral($categoria);
 
if( (!empty(existeCategoria($categoria))) && (empty(existeCategoria($modificar))) && ($idCategoria['id_cat'] == 1) ) {
		$mensaje = "Las reglas del sistema no permiten dar de baja la categoría General, intételo nuevamente con otra categoría";
}
else{
	if( (!empty(existeCategoria($categoria))) && (empty(existeCategoria($modificar))) ) {
		updateCategoria($categoria, $modificar);
		$mensaje = "Se ha realizado con éxito la modificación de la categoria";
	}
	else{
		if (empty(existeCategoria($categoria))){
			$mensaje = "No se puede modificar la categoría. La categoría ingresada no existe, intentelo nuevamente.";
		}
		else{
			$mensaje = "No se puede modificar la categoría. La categoría ingresada ya existe, intentelo nuevamente.";
		}
	}
}

echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'categoria.php'";
echo "</script>";
?>