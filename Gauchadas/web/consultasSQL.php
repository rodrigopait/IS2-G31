<?php

function obtenerUsuario($nombreUsuario, $password){
	$consulta = mysql_query("SELECT * FROM registrado WHERE nombre_usu = '$nombreUsuario' AND password = '$password'" );
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

function agregarDetalleCompra($total,$fecha,$cantCreditos,$idCredito,$idUsuario){
	$consulta = mysql_query("INSERT INTO compra (id_compra, fecha, total, cant_creditos, id_credito, id_registrado) VALUES (NULL, '$fecha', '$total', '$cantCreditos', '$idCredito' , '$idUsuario')");
	return $consulta;
}

function consultaPostulado($id_registrado,$id_gauchada){
	$consulta = mysql_query("SELECT * FROM postula WHERE id_gauchada = '$id_gauchada' AND id_registrado = '$id_registrado'");
	return mysql_fetch_array($consulta);
	
}

function postularse($id_registrado,$id_gauchada){
	return mysql_query("INSERT INTO postula (id_registrado, id_gauchada) VALUES ('$id_registrado','$id_gauchada')");
}

function publicarGauchada($titulo,$descripcion,$ciudad,$fecha_ini,$fecha_fin,$id_foto,$id_registrado){
	return mysql_query("INSERT INTO gauchada (id_gauchada,titulo,descripcion,ciudad,fecha_ini,fecha_fin,id_foto,id_registrado) 
		VALUES (NULL,'$titulo','$descripcion','$ciudad','$fecha_ini','$fecha_fin','$id_foto','$id_registrado')");
}

function agregarImagen($foto){
	return mysql_query("INSERT INTO foto (id_foto,foto) VALUES (NULL,$foto)");
}

function consultaIdImagen($foto){
	$consulta = mysql_query("SELECT id_foto FROM foto WHERE foto = '$foto'");
	return mysql_fetch_array($consulta);
}

function consultarIdGauchada($titulo,$id_registrado){
	$consulta = mysql_query("SELECT * FROM gauchada WHERE titulo = '$titulo' AND id_registrado = '$id_registrado' ");
	return mysql_fetch_array($consulta);
}

function asociarGaucahdaConCategoria($id_categoria,$id_gauchada){
	mysql_query("INSERT INTO categau (id_categoria,id_gauchada) VALUES ('$id_categoria','$id_gauchada')");
}

?>