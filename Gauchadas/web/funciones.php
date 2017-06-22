<?php
include("conexion.php");
include("consultasSQL.php");

function comprobarSession(){
	session_start();
	if(!isset($_SESSION['nombreUsuario'])){
		header("location:sign-in.php");
	}
}

function mostrarMensajeErrorPublicarGauchada($id_usuario){
	$consultaCreditos = cantCreditos($id_usuario);
	$consultaCalificacion = consultaAdeudorCalificacion($id_usuario);
	if ($consultaCreditos['creditos'] < 1){
		echo "<div class='alert alert-danger' style='text-align:center'>
            <button type='button' class='close' data-dismiss='alert'></button>
            <strong>No posee creditos suficientes para publicar una Gauchada.</strong>
            </div>";
	}
	else {
		if ( (!empty($consultaCalificacion['id_aceptado'])) && (empty($consultaCalificacion['id_calificacion'])) ){
			echo "<div class='alert alert-danger' style='text-align:center'>
            <button type='button' class='close' data-dismiss='alert'></button>
            <strong>Usted adeuda calificaciones de gauchadas.</strong>
            </div>";
		}
	}
}

function mostrarBarraDeProgreso($id_rep){
	switch ($id_rep) {
		case '1':
			echo "
				<div class='progress-bar progress-bar-negative'>
                    17%
                </div>"; 
			break;
		case '2':
			echo "
				<div class='progress-bar progress-bar-neutral'>
                    34%
                </div>"; 
			break;
		case '3':
			echo "
				<div class='progress-bar progress-bar-one'>
                    50%
                </div>";
			break;
		case '4':
			echo "
				<div class='progress-bar progress-bar-eleven'>
                    66%
                </div>";
			break;
		case '5':
			echo "
				<div class='progress-bar progress-bar-twentyone'>
                    80%
                </div>";
			break;
		case '6':
			echo "
				<div class='progress-bar progress-bar-positive'>
                    100%
                </div>";
			break;
	}
}

function consultaUsuarioPostulado ($nombreUsuario, $id_usuario, $id_gauchada) {
	if (isset($nombreUsuario)){
        $tabla = consultaGauchada($id_gauchada);
        if( (0 == consultaPostulado($id_usuario,$id_gauchada)) && (date("Y-m-d") <= $tabla['fecha_fin'])){
      		echo "<a class='btn btn-secondary float-right' href='postularse-check.php?variable=".$id_gauchada."'>Postularse  <i class='fa fa-plus' aria-hidden='true'></i></a>";
        } else { 
                echo "<a class='btn btn-secondary float-right' style='background-color: #F27321;'>
                Postulado  <i class='fa fa-check' aria-hidden='true'></i></span></a>";
        }
    }
}

function mostrarUsuarioCreador ($id_gauchada){
	echo "<a href='listUsers.php?id_gauchada=".$id_gauchada."' style='margin-left: 33%''>
         <i class='fa fa-external-link' aria-hidden='true'> Ver usuarios postulados</i></a>";
}

function mostrarMensajeDePostulado($id_gaucahda){
	$tabla = consultarGauchada($id_gaucahda);
    if (!empty($tabla['id_aceptado'])){
        echo "<div class='alert alert-danger' style='text-align:center'>
            <button type='button' class='close' data-dismiss='alert'></button>
            <strong>Usted ya ah elegido a un postulante.</strong>
            </div>";
    }
}

function mostrarBotonesPostulado ($id_aceptado,$id_registrado,$id_gauchada){
	if (empty($id_aceptado)){
        echo "<a class='btn btn-secondary float-right' href='acceptPostulado.php?id_usuario=".$id_registrado."&&id_gauchada=".$id_gauchada."'>
            <i class='fa fa-plus' aria-hidden='true'></i> Aceptar</a>";
    }
    else {
    	if ($id_aceptado == $id_registrado){
    		echo "<button class='btn btn-secondary float-right' style='background-color: #F27321;'>
            <i class='fa fa-check' aria-hidden='true'></i> Aceptado</button>";
    	}
    }                
}

function mostrarGauchada ($consulta){
	while ($tabla = mysql_fetch_array($consulta)){
		echo "
    	<div class='post-preview'>
            <a href='post.php?variable= ".$tabla['id_gauchada']."'>
                <h2 class='post-title'> ".$tabla['titulo']."
                    <img href='post.php?variable= ".$tabla['id_gauchada']."'
                    src='".$tabla['foto']."' width='120' height='100' style='position: absolute;right: 40px;'>
                </h2>
                <h3 class='post-subtitle'></h3>
            </a>
            <p class='post-meta'>Publicado en ".$tabla['ciudad']." el ".$tabla['fecha_ini']."</p>
        </div>
 		<hr>";
    }
}

function mostrarModificarGauchada ($id_gauchada){
    echo "<a href='modificar_gauchada.php?id_gauchada=".$id_gauchada."' style='margin-left: 71%''>
         <i class='fa fa-pencil' aria-hidden='true'> Modificar gauchada</i></a>";
}


?>