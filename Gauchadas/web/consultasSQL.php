<?php

function obtenerUsuario($nombreUsuario, $password){
	$consulta = mysql_query("SELECT * FROM usuario WHERE nombre_usu = '$nombreUsuario' AND password = '$password'" );
	return mysql_fetch_array($consulta);
}

function cantCreditos($nombreUsuario){
	$consulta = mysql_query("SELECT creditos FROM registrado WHERE nombre_usu ='$nombreUsuario'");
	return mysql_fetch_array($consulta);
}
function comprarCreditos($cantCreditos,$idUsuario){
	$consulta = mysql_query("UPDATE registrado SET creditos = '$cantCreditos' WHERE registrado.id_usuario = '$idUsuario'");
}
function valorPorCredito(){
	$consulta = mysql_query("SELECT * FROM credito ORDER BY id_credito desc");
	return mysql_fetch_array($consulta);
}
function agregarDetalleCompra($total,$cantCreditos,$idCredito,$idUsuario){
	$consulta = mysql_query("INSERT INTO compra (id_compra, fecha, total, cant_creditos, id_credito, id_registrado) VALUES (NULL, NULL, '$total', '$cantCreditos', '$idCredito' , '$idUsuario')");
}
?>