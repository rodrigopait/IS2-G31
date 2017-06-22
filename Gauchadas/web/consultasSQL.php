<?php
function obtenerUsuario($nombreUsuario, $password){
	$consulta = mysql_query("SELECT * FROM registrado WHERE nombre_usu = '$nombreUsuario' AND password = '$password'" );
	return mysql_fetch_array($consulta);
}

function cantCreditos($id_usuario){
	$consulta = mysql_query("SELECT creditos FROM registrado WHERE id_usuario ='$id_usuario'");
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
	$consulta = mysql_query("SELECT * FROM postula INNER JOIN gauchada WHERE postula.id_gauchada = '$id_gauchada' AND postula.id_registrado = '$id_registrado'");
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
	return mysql_query("INSERT INTO foto SET foto='$nuevo_path'");
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

function getGauchadas(){
	$consul_gauchada = mysql_query("SELECT * FROM gauchada");
	return mysql_fetch_array($consul_gauchada);
}

function cantGauchadas(){
	return mysql_query("SELECT count(*) FROM gauchada");
}

function consultaUsuario($id_usuario){
	$consulta = mysql_query("SELECT * FROM registrado WHERE id_usuario = '$id_usuario'");
	return mysql_fetch_array($consulta);
}

function consultaCalificaciones($id_usuario){
	return mysql_query("SELECT id_aceptado,id_calificacion FROM gauchada NATURAL JOIN registrado WHERE id_usuario = '$id_usuario'");
}

function modificarCreditos($id_usuario,$creditos){
	mysql_query("UPDATE registrado SET creditos = '$creditos' WHERE id_usuario = '$id_usuario'");
}

function categorias(){
	return mysql_query("SELECT * FROM categoria");
}

function consultarUsuariosConReputacion(){
	return mysql_query("SELECT * FROM registrado NATURAL JOIN reputacion");
}

function consultarUsuariosPostulados ($id_gauchada){
	return mysql_query("SELECT * FROM gauchada INNER JOIN postula ON gauchada.id_gauchada = postula.id_gauchada INNER JOIN registrado ON postula.id_registrado = registrado.id_usuario INNER JOIN reputacion ON registrado.id_rep = reputacion.id_rep WHERE postula.id_gauchada = '$id_gauchada' ");
}

function consultarGauchada ($id_gauchada){
	$consulta = mysql_query("SELECT * FROM gauchada WHERE id_gauchada = '$id_gauchada' ");
	return mysql_fetch_array($consulta);
}

function aceptarPostulado($id_usuario, $id_gauchada){
	mysql_query("UPDATE gauchada SET id_aceptado = '$id_usuario' WHERE id_gauchada = '$id_gauchada' ");
}

function consultaAdeudorCalificacion ($id_registrado){
	$consulta = mysql_query("SELECT * FROM gauchada WHERE id_registrado = '$id_registrado' ");
	return mysql_fetch_array($consulta);
}

function consultaUsuarioParaPerfil($id_usuario){
	$consulta = mysql_query("SELECT * FROM registrado NATURAL JOIN foto NATURAL JOIN reputacion WHERE id_usuario = '$id_usuario'");
	return mysql_fetch_array($consulta);
}

function consultaGauchadaAdeudada ($id_usuario){
	return mysql_query("SELECT * FROM gauchada NATURAL JOIN foto INNER JOIN registrado ON gauchada.id_aceptado = registrado.id_usuario INNER JOIN reputacion ON registrado.id_rep = reputacion.id_rep WHERE gauchada.id_registrado = '$id_usuario' AND id_aceptado IS NOT NULL AND id_calificacion IS NULL");
}

function consultaGauchadaNoAdeudada ($id_usuario){
	return mysql_query("SELECT * FROM gauchada NATURAL JOIN foto NATURAL JOIN calificacion INNER JOIN puntuacion ON calificacion.id_puntuacion = puntuacion.id_puntuacion INNER JOIN registrado ON gauchada.id_aceptado = registrado.id_usuario INNER JOIN reputacion ON registrado.id_rep = reputacion.id_rep WHERE gauchada.id_registrado = '$id_usuario' AND id_calificacion IS NOT NULL");
}

function consultaCalificaion(){
	return mysql_query("SELECT * FROM puntuacion");
}

function modificarGauchada($id_categoria, $titulo, $desc, $ciudad, $fecha_fin, $id_gauchada, $id_foto){
	mysql_query("UPDATE gauchada SET titulo = '$titulo', descripcion = '$desc', ciudad = '$ciudad', fecha_fin='$fecha_fin', id_foto = 'id_foto' WHERE id_gauchada = '$id_gauchada' ");
}

function agregarCalificacion ($text,$id_puntuacion){
	mysql_query("INSERT INTO calificacion (id_calificacion,comentario,id_puntuacion) VALUES (NULL,'$text','$id_puntuacion')");
}

function consultaIdCalificacion ($text,$id_puntuacion){
	$consulta = mysql_query("SELECT id_calificacion FROM calificacion WHERE comentario = '$text' AND id_puntuacion = '$id_puntuacion' ");
	return mysql_fetch_array($consulta);
}

function modificarGauchadaCalificacion ($id_gauchada, $id_calificacion){
	mysql_query("UPDATE gauchada SET id_calificacion = '$id_calificacion' WHERE id_gauchada = '$id_gauchada' ");
}

?>