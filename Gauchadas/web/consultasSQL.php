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
	return mysql_query("INSERT INTO foto SET foto='$foto'");
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

function getUsuario($id_usuario){
	$consult_usuario = mysql_query("SELECT * FROM registrado WHERE id_usuario = '$id_usuario' ");
	return mysql_fetch_array($consult_usuario);
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

function modificarGauchada($titulo, $desc, $ciudad, $fecha_fin, $id_gauchada){
	mysql_query("UPDATE gauchada SET titulo = '$titulo', descripcion = '$desc', ciudad = '$ciudad', fecha_fin='$fecha_fin' WHERE id_gauchada = '$id_gauchada' ");
}

function modificarFotoGauchada($id_gauchada, $id_foto){
	mysql_query("UPDATE gauchada SET id_foto = '$id_foto' WHERE id_gauchada = '$id_gauchada' ");
}

function modificarCategoria($id_categoria, $id_gauchada){
	mysql_query("UPDATE categau SET id_categoria = '$id_categoria' WHERE id_gauchada = '$id_gauchada' ");
}

function modificarUsuario($idusu, $nombre, $password, $email, $ciudad, $telefono ){
	mysql_query("UPDATE registrado SET nombre_usu = '$nombre', password = '$password', mail = '$email', ciudad = '$ciudad', telefono = '$telefono' WHERE id_usuario = '$idusu' ");
}

function modificarFotoUsuario($idusu, $id_foto){
	mysql_query("UPDATE registrado SET id_foto = '$id_foto' WHERE id_usuario = '$idusu' ");
}

function agregarCalificacion ($text,$id_puntuacion){
	mysql_query("INSERT INTO calificacion (id_calificacion,comentario,id_puntuacion) VALUES (NULL,'$text','$id_puntuacion')");
}

function consultaGauchada ($id_gauchada){
	$consulta = mysql_query("SELECT * FROM gauchada WHERE id_gauchada = '$id_gauchada' ");
	return mysql_fetch_array($consulta);
}

function consultaIdCalificacion ($text,$id_puntuacion){
	$consulta = mysql_query("SELECT id_calificacion FROM calificacion WHERE comentario = '$text' AND id_puntuacion = '$id_puntuacion' ");
	return mysql_fetch_array($consulta);
}

function modificarGauchadaCalificacion ($id_gauchada, $id_calificacion){
	mysql_query("UPDATE gauchada SET id_calificacion = '$id_calificacion' WHERE id_gauchada = '$id_gauchada' ");
}

function eliminarGauchada($id_gauchada){
	mysql_query("DELETE FROM gauchada WHERE id_gauchada = $id_gauchada");
}

function consultaPregunta($id_respuesta, $id_usuario){
	$consulta = mysql_query("SELECT * FROM pregunta WHERE id_respuesta = '$id_respuesta' AND id_registrado = '$id_usuario");
return mysql_fetch_array($consulta);
}

function consultaPreguntasYrespuestas($idGauchada){
	return mysql_query("SELECT * FROM preggau INNER JOIN pregunta ON pregunta.id_pregunta = preggau.id_pregunta LEFT JOIN respuesta ON respuesta.id_respuesta = pregunta.id_respuesta WHERE id_gauchada = '$idGauchada'");
}

function consultaRespuesta($id_respuesta){
	$consulta = mysql_query("SELECT * from respuesta WHERE id_respuesta = '$id_respuesta' ");
	return mysql_fetch_array($consulta);
}

function consultaIdRespuesta($ans){
	$consulta = mysql_query("SELECT * FROM respuesta WHERE respuesta = '$ans' ");
	return mysql_fetch_array($consulta);
}

function modificarGauchadaRespuesta($idRespuesta, $idUsuario,$idPregunta){
	mysql_query("UPDATE pregunta SET id_respuesta = '$idRespuesta' WHERE id_registrado = '$idUsuario' AND id_pregunta = '$idPregunta' ");
}

function consultaFechaDeCierre($id_gauchada){
 	$consulta = mysql_query("SELECT fecha_fin FROM gauchada WHERE id_gauchada ='$id_gauchada'");
	return mysql_fetch_array($consulta);
}

function agregarRespuesta($ans){
	mysql_query( "INSERT INTO respuesta (id_respuesta, respuesta) VALUES (NULL,'$ans')");
}

function consultaIdPregunta ($id_usuario, $question){
	$consulta = mysql_query("SELECT * FROM pregunta WHERE id_registrado = '$id_usuario' AND pregunta = '$question'");
	return mysql_fetch_array($consulta);
}

function modificarGauchadaPregunta ($id_gauchada, $id_preggau){
	mysql_query("UPDATE gauchada SET id_preggau = '$id_preggau' WHERE id_gauchada = '$id_gauchada'");
}

function agregarPregunta($id_usuario, $question){
	mysql_query( "INSERT INTO pregunta (id_pregunta,pregunta,id_registrado, id_respuesta) VALUES (NULL,'$question','$id_usuario',NULL)");
}

function agregarReputacion ($rango_min,$rango_max,$titulo) {
	mysql_query("INSERT INTO reputacion (id_rep, rango_min, rango_max, descripcion) VALUES (NULL, '$rango_min', '$rango_max', '$titulo')");
}

function consultaReputacion(){
	return mysql_query("SELECT * FROM reputacion ORDER BY `rango_min` ASC");
}

function calificarUsuario($id_registrado,$puntos,$creditos){
	mysql_query("UPDATE registrado SET puntos = '$puntos', creditos = '$creditos' WHERE id_usuario = '$id_registrado' ");
}

function consultaUsuarioCalificado($id_calificacion) {
	$consulta = mysql_query("SELECT * FROM gauchada WHERE id_calificacion = '$id_calificacion' ");
	return mysql_fetch_array($consulta);
}

function insertarReputacion($rango_min, $rango_max,$titulo){
	mysql_query("INSERT INTO reputacion (id_rep,rango_min,rango_max,descripcion) VALUES (NULL, '$rango_min','$rango_max', '$titulo')");
}

function agregarPreggau($idGauchada, $idPregunta){
	mysql_query("INSERT INTO preggau (id_preggau,id_gauchada, id_pregunta ) VALUES (NULL, '$idGauchada', '$idPregunta') ");
}

function consultaIdPreggau($idGauchada, $idPregunta){
	$consulta = mysql_query("SELECT * FROM preggau WHERE id_gauchada = '$idGauchada' AND id_pregunta = '$idPregunta'");
	return mysql_fetch_array($consulta);
}
function consultaCategorias(){
	$consulta = mysql_query("SELECT tipocategoria FROM categoria");
	return mysql_fetch_array($consulta);
}

function existeCategoria($nueva){
    $consulta = mysql_query("SELECT * FROM categoria WHERE tipocategoria = '$nueva'");
	return mysql_fetch_array($consulta);
}

function agregarCategoria($nueva){
    mysql_query("INSERT INTO categoria(id_cat,tipocategoria) VALUES (NULL, '$nueva')");
}
function borrarCategoria($categoria){
	mysql_query("DELETE FROM categoria WHERE tipocategoria = '$categoria'");
}
function updateCategoria($categoria,$modificar){
	mysql_query("UPDATE categoria SET tipocategoria = '$modificar' WHERE tipocategoria = '$categoria'");
}

function obtenerUsuarios(){
	return mysql_query("SELECT id_usuario,nombre_usu, puntos FROM `registrado` WHERE tipo_adm = 0  ORDER BY puntos desc");
}

function consultaReputacionPorId ($id){
	$consulta = mysql_query("SELECT * FROM reputacion WHERE id_rep = '$id' ");
	return mysql_fetch_array($consulta);
}

function modificarReputacion ($rango_min,$rango_max,$titulo,$id){
	mysql_query("UPDATE reputacion SET rango_min = '$rango_min', rango_max = '$rango_max', descripcion = '$titulo' WHERE id_rep = '$id' ");
}

function eliminarTupla($id){
	mysql_query("DELETE FROM reputacion WHERE id_rep = '$id' ");
}

?>