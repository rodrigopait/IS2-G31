<!DOCTYPE html>
<html lang="en">
<?php include("funciones.php");
session_start();?>
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
    <?php include("navbar.php");?>
    
    <!-- Page Header -->
    <header class="intro-header" style="background-image: url(img/fondo-gauchada.png); background-size: contain;
    background-position-y: 0; height: 333px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="site-heading" style="background-image: url(img/logo-gauchadas.png);
                    background-repeat: repeat-x; background-position: center; width: 90%; margin-left: 7%;
                    padding-bottom: 16%;">
                        <h1 style="text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Gauchadas</h1>
                        <span class="subheading" style="font-weight: bold; text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000; padding-top: 1%">
                            Un Blog Donde Encuentras Gauchadas</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <?php mostrarMensajeDePostulado($_GET['id_gaucahda']);
                $consulta = consultarUsuariosPostulados($_GET['id_gaucahda']);
                $tabla = mysql_fetch_array($consulta);
                if (empty($tabla)){?>
                <h3 style="text-align:center;color:#F27321">
                No se encuantran postulados hasta el momento</h3>
                <?php } $consul_gauchada = consultarUsuariosPostulados($_GET['id_gaucahda']);
                while ($tupla = mysql_fetch_array($consul_gauchada)){?>
                    <div class="post-preview">
                    <h2 class="post-title"><?php echo  $tupla['nombre_usu'];?>
                    <?php mostrarBotonesPostulado($tupla['id_aceptado'],$tupla['id_registrado'],$_SESSION['id_usuario'],$_GET['id_gaucahda']);?>
                    </h2>
                    <div class="progress">
                      <?php mostrarBarraDeProgreso($tupla['id_rep']);?>
                    </div>
                    <a style="color: #777">Reputacion :  </a><?php echo $tupla['descripcion'] ;?>
                    <h3 class="post-subtitle"></h3>
                    <p class="post-meta">Vive en :  
                        <a style="margin-right: 10%"> <?php echo $tupla['ciudad'];?></a>Email : <a> <?php echo $tupla['mail']; ?></a>
                    </p>
                </div>
                <hr>
                <?php } ?>
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
