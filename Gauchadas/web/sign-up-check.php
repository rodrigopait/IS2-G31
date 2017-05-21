<?php 
	include("conexion.php");

	$name = $_POST['name'];
	$pw = $_POST['pw'];
	$email = $_POST['email']; 
	// $phone = $_POST['phone'];
	$city = $_POST['city'];

	$consulta = mysql_query("SELECT * FROM registrado WHERE nombre_usu = '$name'");
	if ($consulta && mysql_num_rows($consulta) > 0 ){
		$mensaje = "Ya existe el nombre de usuario ingresado, por favor ingrese uno diferente";
		echo "<script>";
		echo "alert('$mensaje');";
		echo "window.location = 'sign-up.php'";
		echo "</script>";
	}
	else {
		$insertar = "INSERT INTO 'registrado' ('id_usuario', 'nombre_usu','password' , 'mail', 'ciudad', 'creditos','telefono', 'id_compra', 'id_rep') VALUES (NULL, '$name','$pw', '$email', '$city', '0', NULL, '1', '2')";
		if (!mysql_query($insertar)){
			die ('Error: ' . mysql_error());
			echo "Error al crear el usuario" . "<br />";
		}
		else {
			$mensaje = "El usuario ha sido registrado correctamente! Ya puede iniciar sesion con su nombre de usuario y contraseña";
			echo "<script>";
			echo "alert('$mensaje');";
			echo "window.location = 'sign-up.php'";
			echo "</script>";
		}
	}
?>
