<?php
	include ("conexion.php");
	include ("consultasSQL.php");
	session_start();
	$consultaCreditos = cantCreditos($_SESSION['id_usuario']);
	$consultaCalificaciones = consultaCalificaciones($_SESSION['id_usuario']);
	$adeuda_calificaciones = true;
	while ($calificaciones = mysql_fetch_array($consultaCalificaciones)) {
		if ((!empty($calificaciones['id_aceptado'])) && (empty($calificaciones['id_calificacion']))){
			$adeuda_calificaciones = false;
		}
	}
	if (($consultaCreditos['creditos'] >= 1) && ($adeuda_calificaciones)){
		$titulo = $_POST['title'];
		$descripcion = $_POST['desc'];
		$ciudad = $_POST['city'];
		$fecha_fin = $_POST['fecha_fin'];
		$fecha_ini = date("Y-m-d");
		$id_categoria = $_POST['categoria'];
		$id_registrado = $_SESSION['id_usuario'];
		if ($fecha_fin < date("Y-m-d")){
			$mensaje = "La fecha de fin (Fecha de vencimiento) debe ser mayor o igual al dia de hoy!!";
			echo "<script>";
			echo "alert('$mensaje');";
			echo "window.location = 'public.php'";
			echo "</script>";
		}
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
			$id_foto ="2";
		}
		$creditos = $consultaCreditos['creditos'];
		$creditos --;
		modificarCreditos($id_registrado,$creditos);
		publicarGauchada($titulo,$descripcion,$ciudad,$fecha_ini,$fecha_fin,$id_foto[0],$id_registrado);
		$id_gauchada = consultarIdGauchada($titulo,$id_registrado);
		asociarGaucahdaConCategoria($id_categoria,$id_gauchada[0]);
		$mensaje = "La gauchada ha sido publicada con exito!!  Le quedan: ".$creditos." creditos.";
		echo "<script>";
		echo "alert('$mensaje');";
		echo "window.location = 'index.php'";
		echo "</script>";
	}
	else{
		$mensaje = "Usted adeuda Gauchadas por calificar, por favor califiquelas antes de publicar alguna gauchada.";
		echo "<script>";
		echo "alert('$mensaje');";
		echo "window.location = 'public.php'";
		echo "</script>";
	}
?> 