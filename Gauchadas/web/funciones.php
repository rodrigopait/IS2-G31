<?php
include("conexion.php");

function comprobarSession(){
	session_start();
	if(!isset($_SESSION['nombreUsuario'])){
		header("location:sign-in.php");
	}
}
function getGauchadas()
{
	$consul_gauchada = mysql_query("SELECT * FROM gauchada");
	return mysql_fetch_array($consul_gauchada);
}

function cantGauchadas()
{
	$cant = mysql_query("SELECT count(*) FROM gauchada");
	return $cant;
}

/*function mostrarGauchadas(){
	for($cant > $limit ){
		<div class="post-preview">
	    <a name="view-post" method="GET" action="post.php">
	        <h2 class="post-title">
	            <?php $tupla = getGauchadas(); 
	                echo $tupla['titulo'];
	                $id_gauchada = $tupla['id_gauchada'];?>
	                <a type="text" name="nombre" value="'$id_gauchada'">
	        </h2>
	        <h3 class="post-subtitle"></h3>
	    </a>
	        <p class="post-meta">Posted by <a href="#"><?php $vari = $tupla['id_registrado']; 
	        $consul_usuario = mysql_query("SELECT nombre_usu FROM gauchada INNER JOIN registrado ON gauchada.id_registrado=registrado.id_usuario WHERE id_registrado = '$vari'");
		    $tabla = mysql_fetch_array($consul_usuario);
	        echo $tabla[0]?> 
	    </a>on September 24, 2017</p>
	    </div>
	}
}
*/
?>