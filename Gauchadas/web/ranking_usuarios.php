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
    <?php include("navbarAdm.php"); ?>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url(img/fondo-gauchada.png); background-size: contain;
    background-position-y: 0; height: 333px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading" style="background-image: url(img/logo-gauchadas.png);
                    background-repeat: repeat-x; background-position: center; width: 90%; margin-left: 7%;
                    padding-bottom: 20%;">
                        <h1 style=" text-align: center; text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Categorías</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container" style="text-align: -webkit-center;">
            <i style="margin-right: 5%;"">
                <a class="adm" href="reputacion.php">Reputacion</a>
            </i>
            <i style="margin-right: 5%;"">
                <a class="adm" href="categoria.php">Categoría</a>
            </i>
            <i style="margin-right: 5%;"">
                <a class="adm" href="#" >Ver mis ganancias</a>            
            </i>
            <i style="margin-right: 5%;"">
                <a class="adm" href="ranking_usuarios.php">Ranking de mejores usuarios</a>
            </i>
    </div>
    <hr>
    <!-- Post Content -->
    <div class="container">
        <div class="clearfix">
            <dl class="row" style="margin-left: 7%">
                <dt class="col-sm-3" style="padding: "><h5><u>Usuario</u></h5></dt>
                <dt class="col-sm-3" style="margin-left: 14.5%"><h5><u>reputación</u></h5></dt>
                <?php $consulta = obtenerUsuarios();
                while ($tablaUsers = mysql_fetch_array($consulta)){ ?>
                    <?php $reputacion = calcularReputacion($tablaUsers['id_usuario']);?>
                    <dt class="col-sm-5 text-muted" style="margin-right: 3.5%"><?php echo $tablaUsers['nombre_usu']; ?></dt>
                    <dt class="col-sm-2 text-muted" style="margin-left: -6%"><?php echo $reputacion['descripcion']; ?></dt>
                <?php }?>
          </dl>
        </div>
    </div>

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