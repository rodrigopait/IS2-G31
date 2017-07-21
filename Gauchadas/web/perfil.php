<!DOCTYPE html>
<html lang="en">
<?php include("conexion.php");
include("funciones.php");
session_start();?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gauchadas</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Additional fonts for this theme -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='css/fonts.css' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this theme -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Temporary navbar container fix until Bootstrap 4 is patched -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>

</head>

<body>

    <!-- Navigation -->
    <?php
    if(isset($_SESSION['nombreUsuario'])){
        include("navbar.php");    
    }
    else{
        include("navbarObservador.php");
    }?>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url(img/fondo-gauchada.png); background-size: cover;
    background-position-y: 0; height: 333px;">
        <?php $id_usuario = ($_GET['id_usuario']);
        $tabla = consultaUsuarioParaPerfil($id_usuario);
        $reputacion = calcularReputacion($id_usuario); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading" style="text-align: center;">
                        <h1 style="text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;"> <?php echo $tabla['nombre_usu'];?> </h1>
                        <h2 class="subheading"></h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <table class="container">
            <tbody class="row">
                <tr>
                <td style="width: 15%;vertical-align: top;">
                    <img class="img-responsive" style="margin-bottom: 10%; max-width: 165px; max-height: 165px;" 
                        src="<?php echo $tabla['foto'];?>">
                    <a href="misgauchadas.php">Mis Gauchadas</a>
                    <a href="calificaciones.php">Mis Calificaciones</a>
                    <a href="misPostulaciones.php?id_usuario=<?php echo $tabla['id_usuario']?>">Mis postulaciones</a>
                    <a href="modificar_perfil.php?variable=<?php echo $tabla['id_usuario']?>">Modificar Perfil</a>
                </td>
                <td>
                <div class="col-md-8 col-md-10" style="margin-left: 3%">
                    <div class="clearfix">
                        <dl class="row">
                            <dt class="col-sm-3"><h3><u>Nombre:</u></h3></dt>
                            <dd class="col-sm-9 text-muted"> <?php echo $tabla['nombre_usu']?></dd>

                            <dt class="col-md-3"><h3><u>Contraseña:</u></h3></dt>
                            <dd class="col-sm-9 text-muted"> **********</dd>

                            <dt class="col-sm-3"><h3><u>Mail:</u></h3></dt>
                            <dd class="col-sm-9 text-muted"> <?php echo $tabla['mail']?></dd>

                            <dt class="col-sm-3"><h3><u>Ciudad:</u></h3></dt>
                            <dd class="col-sm-9 text-muted"> <?php echo $tabla['ciudad']?></dd>

                            <dt class="col-sm-3"><h3><u>Creditos:</u></h3></dt>
                            <dd class="col-sm-9 text-muted"> <?php echo $tabla['creditos']?></dd>

                            <dt class="col-sm-3"><h3><u>Telefono:</u></h3></dt>
                            <dd class="col-sm-9 text-muted"> <?php echo $tabla['telefono']?></dd>

                            <dt class="col-sm-3"><h3><u>Reputacion:</u></h3></dt>
                            <dd class="col-sm-9 text-muted"> <?php echo $reputacion['descripcion']; ?></dd>
                        </dl>
                   </div>
                </div>
                </td>
            </tbody>
        </table>
    </article>

    <hr>

    <!-- Footer -->
    <?php include("footer.php");?>
    <!-- jQuery Version 3.1.1 -->
    <script src="js/jquery.js"></script>

    <!-- Tether -->
    <script src="js/tether.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
