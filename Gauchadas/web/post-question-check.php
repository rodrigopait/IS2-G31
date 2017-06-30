<?php
include ("conexion.php");
include ("consultasSQL.php");
session_start();
$idUsuario = $_SESSION['id_usuario'];
$question = $_POST['question'];
agregarPregunta($idUsuario, $question);
$id_Pregunta = consultaIdPregunta($idUsuario, $question);
modificarGauchadaPregunta($_GET['id_gauchada'] , $id_Pregunta['id_pregunta']);
$pag =$_GET['id_gauchada'];
$mensaje = "La pregunta fue publicada exitosamente!";
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'post.php?variable=".$pag."'";
echo "</script>";
?>