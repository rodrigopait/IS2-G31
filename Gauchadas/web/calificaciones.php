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
    <?php include("navbar.php"); ?>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url(img/fondo-gauchada.png); background-size: contain;
    background-position-y: 0; height: 333px;">
        <!-- <?php $id = ($_GET['variable']);
        $consulta = mysql_query("SELECT * FROM gauchada NATURAL JOIN foto NATURAL JOIN categau INNER JOIN categoria ON id_categoria = id_cat WHERE id_gauchada = '$id'");
        $tabla = mysql_fetch_array($consulta);?> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading" style="text-align: center;">
                        <h1 style="text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;"> Mis Calificaciones </h1>
                        <h2 class="subheading"></h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1" >
                    <div class="caption text-muted">
                        <h2>Calificaciones Adeudadas:</h2>
                    </div>
                    <div>
                        <?php $consulta = consultaGauchadaAdeudada($_SESSION['id_usuario']);
                        $consultaVacio = consultaGauchadaAdeudada($_SESSION['id_usuario']);
                        if (empty(mysql_fetch_array($consultaVacio))){ ?>
                            <h3 class="caption text-muted">No se encuantran publicaciones</h3>
                        <?php }
                        mostrarGauchada($consulta);?>
                    </div>
                    <div class="caption text-muted">
                        <h2>Calificaciones Sin Adeudar:</h2>
                    </div>
                    <div>
                        <?php $consulta = consultaGauchadaNoAdeudada($_SESSION['id_usuario']);
                        $consultaVacio = consultaGauchadaNoAdeudada($_SESSION['id_usuario']);
                        if (empty(mysql_fetch_array($consultaVacio))){ ?>
                            <h3 class="caption text-muted">No se encuantran publicaciones</h3>
                        <?php }
                        mostrarGauchada($consulta);?>
                    </div>
            </div>
        </div>
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
