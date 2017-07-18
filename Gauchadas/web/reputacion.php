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
                        <h1 style=" text-align: center; text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Reputacion</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-15 offset-lg-1 col-md-10" style="padding: 0%">
                <form method='POST' action='reputacion_alta.php' style="display: flex;">
                    <input class="form-control" type="number" min="1" max="9999999" title="Ingrese un numero mayor o igual que 1(uno)" name="rango_min" value="" placeholder="Rango minimo" required style="margin-right: 0.5%;">
                    <input class="form-control" min="1" max="9999999" type="number" name="rango_max" value="" placeholder="Rango maximo" required style="margin-right: 0.5%;">
                    <input class="form-control" type="text" name="titulo" value="" placeholder="Titulo" required style="margin-right: 0.5%;">
                    <button class="btn btn-secondary" type="submit">Agregar Reputacion</button>
                </form>
                <hr>
                <div>
                        <div class="clearfix">
                            <dl class="row">
                                <dt class="col-sm-3" style="padding: "><h5><u>Rango minimo</u></h5></dt>
                                <dd class="col-sm-3" style="padding: 0%"><h5><u>Rango maximo</u></h5></dd>
                                <dd class="col-sm-6" style="padding: 0%"><h5><u>Titulo</u></h5></dd>
                                <?php $reputacion = consultaReputacion();
                                while ($tablaRep = mysql_fetch_array($reputacion)){?>
                                    <dt class="col-sm-3 text-muted" style="margin-right: 3.5%"><?php echo mostrarRangoMinimo($tablaRep['rango_min']); ?></dt>
                                    <dd class="col-sm-2 text-muted"><?php echo mostrarRangoMaximo($tablaRep['rango_max']); ?></dd>
                                    <dd class="col-sm-3 text-muted"><?php echo $tablaRep['descripcion']; ?></dd>
                                    <?php if (($tablaRep['id_rep'] == 1 ) OR ($tablaRep['id_rep'] == 2)){?>
                                        <dd class="col-sm-2" ></dd>
                                    <?php } else {?>
                                        <button onclick="window.location.href='reputacion_modificar.php?id_rep=<?php echo $tablaRep['id_rep'];?>'" class="btn btn-secondary" style="margin-right: 0.5%; margin-bottom: 0.5%;">Modificar</button>
                                        <button onclick="window.location.href='reputacion_baja.php?id_rep=<?php echo $tablaRep['id_rep'];?>'" class="btn btn-secondary" style="margin-bottom: 0.5%" >Eliminar</button>
                                <?php }}?>
                            </dl>
                        </div>
                </div>
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