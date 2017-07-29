<!DOCTYPE html>
<html lang="en">
<?php 
include("conexion.php");
session_start();
?>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
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
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
        if ($_SESSION['tipo_adm'] == 1){
            include ("navbarAdm.php");
        }
        else include("navbar.php");    
    }
    else{
        include("navbarObservador.php");
    }?>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url(img/fondo-gauchada.png); background-size: cover;
    background-position-y: 0; height: 333px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading" style="background-image: url(img/logo-gauchadas.png);
                    background-repeat: repeat-x; background-position: center; width: 90%; margin-left: 7%;
                    padding-bottom: 20%;">
                        <h1 style=" text-align: center; text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Administrador</h1>
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
                <a class="adm" href="vermisganancias.php" >Ver ganancias</a>            
            </i>
            <i style="margin-right: 5%;"">
                <a class="adm" href="ranking_usuarios.php">Ranking de mejores usuarios</a>
            </i>
    </div>
    <hr>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-15 offset-lg-1 col-md-10" style="padding: 0%">
                <form method='POST' action='mostrarganancias.php' style="display: flex;">
                    <input class="form-control" type="date" title="Ingrese una fecha" name="fechainicio" placeholder="Desde:" required style="margin-right: 0.5%;">
                    <input class="form-control" type="date" title="Ingrese una fecha" name="fechafin" placeholder="Hasta:" required style="margin-right: 0.5%;">
                    <button class="btn btn-secondary" type="submit">Mostrar Ganancias</button>
                </form>
            </div>
        </div>
    </div>
    <hr style="margin-top: 300px">
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