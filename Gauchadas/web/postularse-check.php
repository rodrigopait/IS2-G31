<?php include("conexion.php");
include("consultasSQL.php");
session_start();
$id = ($_GET['variable']);
postularse($_SESSION['id_usuario'],$id);
header('Location: post.php?variable='.$id);
?>
