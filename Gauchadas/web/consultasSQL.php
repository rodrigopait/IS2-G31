<?php

function obtenerUsuario($nombreUsuario, $password){
	$consulta = mysql_query("SELECT * FROM registrado WHERE nombre_usu = '$nombreUsuario' AND password = '$password'" );
	return mysql_fetch_array($consulta);

}
?>