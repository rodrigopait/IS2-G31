<?php 
include("funciones.php");

agregarCalificacion($_POST['text'],$_POST['puntuacion']);
$id_calificacion = consultaIdCalificacion($_POST['text'],$_POST['puntuacion']);
modificarGauchadaCalificacion($_GET['id_gauchada'],$id_calificacion['id_calificacion']);
$usuario = consultaUsuarioCalificado($id_calificacion['id_calificacion']);
agregarCalificacionUsuario($usuario['id_aceptado'],$_POST['puntuacion']);
$mensaje = "Se ah realizado con exito la calificacion de la gaucahda";
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'calificaciones.php'";
echo "</script>";

?>