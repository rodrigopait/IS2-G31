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
        $hoy = date("Y-m-d");
    	if(0 == consultaPostulado($id_usuario,$id_gauchada) && ($hoy <= $tabla['fecha_fin'])){
  			echo "<a class='btn btn-secondary float-right' href='postularse-check.php?variable=".$id_gauchada."'>Postularse  <i class='fa fa-plus' aria-hidden='true'></i></a>";
        } else {
                if( 0 != consultaPostulado($id_usuario,$id_gauchada)){
                    echo "<a class='btn btn-secondary float-right' style='background-color: #F27321;'>
                        Postulado  <i class='fa fa-check' aria-hidden='true'></i></span></a>";
                }
                 else { 
                        
                    }
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
            <a href='post.php?variable=".$tabla['id_gauchada']."'>
                <h2 class='post-title'>".$tabla['titulo']."
                    <img href='post.php?variable=".$tabla['id_gauchada']."'
                    src='".$tabla['foto']."' width='120' height='100' style='position: absolute;right: 40px;'>
                </h2>
                <h3 class='post-subtitle'></h3>
            </a>
            <p class='post-meta'>Publicado en ".$tabla['ciudad']." el ".$tabla['fecha_ini']."</p>
        </div>
 		<hr>";
    }
}

function mostrarCompra ($fechaInicio, $fechaFin){
    $compra = getComprasEntreFecha($fechaInicio, $fechaFin);
    while ($tabla = mysql_fetch_array($compra)){
        $usuario = getgetTitularCompra($tabla['id_registrado']);
        echo "
        <div class='post-preview'>
                <h2 class='post-title'>".$usuario."
                </h2>
                <h3 class='post-subtitle'></h3>
            </a>
            <p class='post-meta'>Compro ".$tabla['cant_creditos']."creditos, el ".$tabla['fecha']."</p>
        </div>
        <hr>";

    }
}

function mostrarMisGauchada($consulta, $id_registrado){
    while ($tabla = mysql_fetch_array($consulta)){
        if ($tabla['id_registrado'] == $id_registrado ){
            echo "
        <div class='post-preview'>
            <a href='post.php?variable= ".$tabla['id_gauchada']."'>
                <h2 class='post-title'> ".$tabla['titulo']."
                    <img href='post.php?variable=".$tabla['id_gauchada']."'
                    src='".$tabla['foto']."' width='120' height='100' style='position: absolute;right: 40px;'>
                </h2>
                <h3 class='post-subtitle'></h3>
            </a>
            <p class='post-meta'>Publicado en ".$tabla['ciudad']." el ".$tabla['fecha_ini']."</p>
            </div>";
            mostrarModificarGauchada($tabla['id_gauchada']);
            mostrarEliminarGauchada($tabla['id_gauchada']);
            echo "<hr>";
        }
    }
}

function mostrarModificarGauchada ($id_gauchada){
    echo "<a href='modificar_gauchada.php?id_gauchada=".$id_gauchada."' style='margin-left: 71%''>
         <i class='fa fa-pencil' aria-hidden='true'> Modificar gauchada</i></a>";
}

function mostrarEliminarGauchada ($id_gauchada){
    echo "<a href='eliminar_gauchada.php?id_gauchada=".$id_gauchada."' style='margin-left: 71%''>
         <i class='fa fa-remove' aria-hidden='true' > Eliminar gauchada</i></a>";
}

function mostrarPreguntas($id_pregunta, $respuestas, $idGauchada, $dueño){
    $preguntasYrespuestas = consultaPreguntasYrespuestas($idGauchada);
    while ($tabla = mysql_fetch_array($preguntasYrespuestas)){
        $nombre = consultaUsuario($tabla['id_registrado']);
        echo "<hr style='width:100%'><p class='post-meta'><b> Usuario: </b> ".$nombre['nombre_usu']."</p><p class='post-meta'><b>Pregunta:</b> ".$tabla['pregunta']."</p>";
        if($tabla['id_respuesta'] != NULL) {
                echo "<p class='post-meta'><b>Respuesta:</b> ".$tabla['respuesta']."</p>" ;
        }
        else{
            if(isset($_SESSION['nombreUsuario'])){
                if($_SESSION['id_usuario'] == $dueño) {
                    echo "<form method='POST' action='post-answer-check.php?id_gauchada=".$tabla['id_gauchada']."&&idPregunta=".$tabla['id_pregunta']."' '>
                        <div class='control-group'>
                            <div class='form-group floating-label-form-group controls'>
                                <label><i class='fa fa-question-circle' aria-hidden='true'></i> Respuesta</label>
                                <textarea type='text' rows='2' class='form-control' placeholder='Escribe una respuesta a esta pregunta' required title='Por favor ingrese una respuesta' name='answer' value=''></textarea>  
                            </div>
                            <div class='form-group'>
                                <button type='submit' class='btn btn-secondary'> Contestar pregunta</button>
                            </div>
                        </div>
                     </form><hr style='width:100%'> ";
                }
            }
        }
    }
}
function mostrarMensajeErrorPregunta($id_usuario, $id_gauchada, $fecha, $hoy){
    $consultaCalificacion = consultaAdeudorCalificacion($id_usuario);
    if ($fecha < $hoy){
        echo "<div class='alert alert-danger' style='text-align:center'>
            <button type='button' class='close' data-dismiss='alert'></button>
            <strong>La gauchada ya caducó, no puedes publicar preguntas</strong>
            </div>";
    }
    else {
        if ( (!empty($consultaCalificacion['id_aceptado'])) && (empty($consultaCalificacion['id_calificacion'])) ){
            echo "<div class='alert alert-danger' style='text-align:center'>
            <button type='button' class='close' data-dismiss='alert'></button>
            <strong>La gauchada ya tiene un usuario postulado que fue aceptado, no puedes publicar preguntas.</strong>
            </div>";
        }
        else{
            if (!empty(consultaAceptado($id_gauchada))){
                 echo "<div class='alert alert-danger' style='text-align:center'>
                    <button type='button' class='close' data-dismiss='alert'></button>
                    <strong>La gauchada ya tiene un usuario postulado que fue aceptado, no puedes publicar preguntas.</strong>
                     </div>";
            }
        }
    }
}

function calcularReputacion ($id_registrado){
    $usuario = getUsuario($id_registrado);
    $consulta = consultaReputacion();
    while ($reputacion = mysql_fetch_array($consulta)) {
        if (($reputacion['rango_min'] <= $usuario['puntos'])&&($reputacion['rango_max'] >= $usuario['puntos'])){
            return $reputacion;
        }
    }
}

function agregarCalificacionUsuario($id_registrado,$puntuacion){
    switch ($puntuacion) {
        case 1:
            $usuario = getUsuario($id_registrado);
            $puntos = $usuario['puntos'] + 1;
            $creditos = $usuario['creditos'] + 1;
            break;
        case 2:
            $usuario = getUsuario($id_registrado);
            $puntos = $usuario['puntos'] - 2;
            $creditos = $usuario['creditos'];
            break;
        default:
            $usuario = getUsuario($id_registrado);
            $puntos = $usuario['puntos'];
            $creditos = $usuario['creditos'];
            break;
    }
    calificarUsuario($id_registrado,$puntos,$creditos);
}

function calcularTablaAModifcar($min,$max,$tupla_min,$tupla_max){
    $subMinimo = $min - $tupla_min;
    $subMaximo = $tupla_max - $max;
    if ( $subMinimo <= $subMaximo) {
        return $min;
    }
    else return $max;
}

function mostrarRangoMinimo($rango_min){
    if ($rango_min == (-9999999) ){
        return "- ∞";
    }
    else return $rango_min;
}

function mostrarRangoMaximo($rango_max){
    if ($rango_max == 9999999 ) return "∞";
    else return $rango_max;
}


function mostrarMisPostulaciones($consulta, $id_registrado){
    if(mysql_num_rows($consulta) == 0){
        echo "<h3 class='caption text-muted'>Aún no te has postulado en ninguna gauchada.</h3>";
    }
    else{
        while ($tabla = mysql_fetch_array($consulta)){
            if ($tabla['id_registrado'] == $id_registrado ){
                echo "
            <div class='post-preview'>
                <a href='post.php?variable= ".$tabla['id_gauchada']."'>
                    <h2 class='post-title'> ".$tabla['titulo']."
                        <img href='post.php?variable=".$tabla['id_gauchada']."'
                        src='".$tabla['foto']."' width='120' height='100' style='position: absolute;right: 40px;'>
                    </h2>
                    <h3 class='post-subtitle'></h3>
                </a>
                <p class='post-meta'>Publicado en ".$tabla['ciudad']." el ".$tabla['fecha_ini']."</p>
                </div>";
                echo "<hr>";
            }
        }
    }    
}


?>