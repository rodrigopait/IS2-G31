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
                        <h1 style=" text-align: center; text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Modificar Reputacion</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-15 offset-lg-1 col-md-10" style="padding: 0%">
                <?php $reputacion = consultaReputacionPorId($_GET['id_rep']); ?>
                <form method='POST' action="reputacion_modificar_check.php?id=<?php echo $_GET['id_rep']; ?>" style="display: flex;">
                    <input class="form-control" type="number" min="1" max="9999999" name="rango_min" value="<?php echo $reputacion['rango_min']; ?>"required style="margin-right: 0.5%;">
                    <input class="form-control" min="1" max="9999999" type="number" name="rango_max" value="<?php echo $reputacion['rango_max']; ?>" required style="margin-right: 0.5%;">
                    <input class="form-control" type="text" name="titulo" value="<?php echo $reputacion['descripcion']; ?>" required style="margin-right: 0.5%;">
                    <button class="btn btn-secondary" type="submit">Modificar Reputacion</button>
                </form>
            </div>
        </div>
    </div>
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