<?php 
$conexion = mysql_connect("localhost","root","") or die ('No se pudo conectar: ' . mysql_error());
mysql_select_db( "Gauchadas", $conexion) or die ("Error: No es posible establecer la conexión");

/*$result = mysql_query("SELECT * FROM Usuario");
$tupla = mysql_fetch_array($result);
echo "Nombre: ".$tupla['nombre_usu'];*/
?>



