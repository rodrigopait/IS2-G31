<?php
include ("conexion.php");
include ("consultasSQL.php");
session_start();
if(isset($_SESSION['nombreUsuario'])){
    if(isset($_POST['question'])){
        $idUsuario = $_SESSION['id_usuario'];
        $que = $_POST['question'];
        agregarPregunta($idUsuario, $que);
        $idPregunta = consultaIdPregunta($idUsuario, $que);
        modificarGauchadaPregunta($_GET['id_gauchada'] , $idPregunta['id_preg']);
        $mensaje = "La pregunta fue publicada exitosamente!";
        echo "<script>";
        echo "alert('$mensaje')";
        echo "window.location = 'post.php?variable=<?php echo $id'";
        echo "</script>";
    
        if(isset($_POST['answer'])){
            $ans = $_POST['answer'];
            agregarRespuesta($ans);
            $idRespuesta = consultaIdRespuesta($ans);
            modificarGauchadaRespuesta($idRespuesta['id_respuesta'], $idUsuario, $que);
            $mensaje = "La respuesta fue publicada exitosamente!";
            echo "<script>";
            echo "alert('$mensaje')";
            header("post.php");
            echo "</script>";
        }
    }
}   
?>