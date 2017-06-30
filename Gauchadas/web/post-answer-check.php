<?php
include ("conexion.php");
include ("consultasSQL.php");
session_start();
$idUsuario = $_SESSION['id_usuario'];
$answer = $_POST['answer'];
agregarRespuesta($answer);
$idRespuesta = consultaIdRespuesta($answer);
modificarGauchadaRespuesta($idRespuesta['id_respuesta'], $idUsuario, $_GET['id_pregunta']);
$pag =$_GET['id_gauchada'];
echo $pag;
$mensaje = "La respuesta fue publicada exitosamente!";
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'post.php?variable=".$pag."'";
echo "</script>";
?>