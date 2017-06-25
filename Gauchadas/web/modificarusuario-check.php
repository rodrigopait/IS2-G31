<?php

include ("conexion.php");
include ("consultasSQL.php");
session_start();
$idusu = $_GET['usuario'];
$nombre = $_POST['nombreusuario'];
$password = $_POST['password'];
$email = $_POST['email'];
$ciudad = $_POST['ciudad'];
$telefono = $_POST['telefono'];
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
	$id_foto['id_foto'] = '7';
}
modificarUsuario($idusu, $nombre, $password, $email, $ciudad, $telefono, $id_foto['id_foto'] );
$mensaje = "Se ha modificado la gauchada correctamente.";
		echo "<script>";
		echo "alert('$mensaje');";
		echo "window.location = 'perfil.php?id_usuario=$idusu.php'";
		echo "</script>";


?>