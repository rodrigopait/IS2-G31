<?php

	include ("conexion.php");
	include ("consultasSQL.php");
	session_start();
	//capturamos los datos del fichero subido    
	$titulo = $_POST['title'];
	$descripcion = $_POST['desc'];
	$ciudad = $_POST['city'];
	$fecha_fin = $_POST['fecha_fin'];
	$fecha_ini = date("Y-m-d");
	$id_registrado = $_SESSION['id_usuario'];
	if ($_FILES['image']['name']){
		$type=$_FILES['image']['type'];
	$tmp_name = $_FILES['image']["tmp_name"];
	$name = $_FILES['image']["name"];
	//Creamos una nueva ruta (nuevo path)
	//Así guardaremos nuestra imagen en la carpeta "images"
	$nuevo_path="img/".$name;
	//Movemos el archivo desde su ubicación temporal hacia la nueva ruta
	# $tmp_name: la ruta temporal del fichero
	# $nuevo_path: la nueva ruta que creamos
	move_uploaded_file($tmp_name,$nuevo_path);
	//Extraer la extensión del archivo. P.e: jpg
	# Con explode() segmentamos la cadena de acuerdo al separador que definamos. En este caso punto (.)
	$array=explode('.',$nuevo_path);
	# Capturamos el último elemento del array anterior que vendría a ser la extensión
	$ext= end($array);
	$res = mysql_query("INSERT INTO foto SET foto='$nuevo_path'");
	//Imprimimos un texto de subida exitosa.
	$id_foto = consultaIdImagen($nuevo_path);
	}
	else{
		$id_foto ="2";
	}
	publicarGauchada($titulo,$descripcion,$ciudad,$fecha_ini,$fecha_fin,$id_foto[0],$id_registrado);
	header('Location : index.php');

/**	$nombre_file = "img/".mktime().'.jpg';
	$consulta = mysql_query("INSERT INTO foto SET foto='$nombre_file'");
	$origen = $_FILES['image']['tmp_name'];
	$destino = "img/$nombre_file";
	move_uploaded_file($origen, $destino);
	echo "titulo: ".$titulo = $_POST['title']."<br/>";
	echo "descripcion: ".$descripcion = $_POST['desc']."<br/>";
	echo "ciudad: ".$ciudad = $_POST['city']."<br/>";
	echo "fecha_ini: ".$fecha_ini = date("Y-m-d")."<br/>";
	echo "fecha_fin: ".$fecha_fin = $_POST['fecha_fin']."<br/>";
	echo "foto: ".$foto = $id_foto[0]."<br/>";
	echo "id_registrado: ".$id_registrado = $_SESSION['id_usuario']."<br/>";

/**
	// $uploadedfileload="true";
	$temp = $_FILES['image']['tmp_name'];
	echo $_FILES['image']['name'];
	// if (!($_FILES['uploadedfile']['type'] =="image/pjpeg" OR $_FILES['uploadedfile']['type'] =="image/gif")){
	// 	$msg=" Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
	// 	$uploadedfileload="false";
	// }
	$dir = "img/";
	$file_name=$_FILES['image']['name'];
	move_uploaded_file ($temp,"$dir/$file_name");
	$name="img/$file_name";
	// if($uploadedfileload=="true"){
	// 	if(move_uploaded_file ($_FILES['uploadedfile']['tmp_name'], $name)){
	// 		echo "Ha sido subido satisfactoriamente";
			// agregarImagen($name);
			// $id_foto = consultaIdImagen($name);
	// 	}
	// 	else{
	// 		echo "Error al subir el archivo";
	// 	}
	// }else{
	// 	echo $msg;
	// }

	echo "titulo: ".$titulo = $_POST['title']."<br/>";
	echo "descripcion: ".$descripcion = $_POST['desc']."<br/>";
	echo "ciudad: ".$ciudad = $_POST['city']."<br/>";
	echo "fecha_ini: ".$fecha_ini = date("Y-m-d")."<br/>";
	echo "fecha_fin: ".$fecha_fin = $_POST['fecha_fin']."<br/>";
	echo "foto: ".$foto = $id_foto[0]."<br/>";
	echo "id_registrado: ".$id_registrado = $_SESSION['id_usuario']."<br/>";

	publicarGauchada($titulo,$descripcion,$ciudad,$fecha_ini,$fecha_fin,$foto,$id_registrado);

	// header('Location: index.php');
**/
?> 