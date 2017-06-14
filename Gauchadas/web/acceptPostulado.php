<?php
include ("funciones.php");
session_start();
aceptarPostulado($_GET['id_usuario'],$_GET['id_gauchada']);
$mensaje = "Se ah aceptado el postulante con exito!!";
echo "<script>";
echo "alert('$mensaje');";
echo "window.location = 'listUsers.php?id_gauchada=".$_GET['id_gauchada']."'";
echo "</script>";
?>