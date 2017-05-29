<?php
	include ("conexion.php");
	include ("consultasSQL.php");
	session_start();

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

	//publicarGauchada($titulo,$descripcion,$ciudad,$fecha_ini,$fecha_fin,$foto,$id_registrado);

	// header('Location: index.php');

?> 