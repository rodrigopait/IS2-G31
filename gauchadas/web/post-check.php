<?php
include ("conexion.php");
include ("consultasSQL.php");
session_start();
        $idUsuario = $_SESSION['id_usuario'];
        $que = $_POST['question'];
        agregarPregunta($idUsuario, $que);
        $idPregunta = consultaIdPregunta($idUsuario, $que);
        modificarGauchadaPregunta($_GET['id_gauchada'] , $idPregunta['id_preg']);
        $mensaje = "La pregunta fue publicada exitosamente!";
        echo "<script>";
        echo "alert('$mensaje')";
        echo "window.location = 'post.php?variable=<?php echo $_GET['id_gauchada']?>'";
        echo "</script>";
?>