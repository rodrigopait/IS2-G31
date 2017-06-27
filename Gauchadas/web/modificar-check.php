<?php

include ("conexion.php");
include ("consultasSQL.php");
session_start();

$id_gauchada = $_GET['id_gauchada'];
$titulo = $_POST['title'];
$desc = $_POST['desc'];
$ciudad = $_POST['city'];
$fecha_fin = $_POST['fecha_fin'];
$id_categoria = $_POST['categoria'];
if ($_FILES['image']['name']){
	$type=$_FILES['image']['type'];
	$tmp_name = $_FILES['image']["tmp_name"];
	$name = $_FILES['image']["name"];
	$nuevo_path="img/".$name;
	move_uploaded_file($tmp_name,$nuevo_path);
	$array=explode('.',$nuevo_path);
	$ext= end($array);
	$res = agregarImagen($nuevo_path);
	$id_foto = consultaIdImagen($nuevo_path);
	}
else{
	$id_foto['id_foto'] = "2";
}
modificarGauchada($id_categoria, $titulo, $desc, $ciudad, $fecha_fin, $id_gauchada, $id_foto['id_foto']);
$mensaje = "Se ha modificado la gauchada correctamente.";
		echo "<script>";
		echo "alert('$mensaje');";
		echo "window.location = 'post.php?variable=$id_gauchada.php'";
		echo "</script>";


?>