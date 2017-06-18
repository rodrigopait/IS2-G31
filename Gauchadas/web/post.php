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
    <header class="intro-header" style="background-image: url(img/fondo-gauchada.png); background-size: contain;
    background-position-y: 0; height: 333px;">
        <?php $id = ($_GET['variable']);
        $consulta = mysql_query("SELECT * FROM gauchada NATURAL JOIN foto NATURAL JOIN categau INNER JOIN categoria ON id_categoria = id_cat WHERE id_gauchada = '$id'");
        $tabla = mysql_fetch_array($consulta);?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading" style="text-align: center;">
                        <h1 style="text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;"> <?php echo $tabla['titulo'];?> </h1>
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
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1" style="text-align: justify;line-height: 2;">
                    <div class="caption text-muted" style="text-align: left;"> Fecha de creación:
                        <?php echo $tabla['fecha_ini'];?> <i style="margin-left: 40%">Categoria : <?php echo $tabla['tipocategoria']?></i></div>
                        <?php echo $tabla['descripcion']?>
                    <br />
                    <a href="post.php?variable=<?php echo $tabla['id_gauchada'];?>&&postulado=0">
                        <img class="img-responsive" style="margin-bottom: 2%; max-width: 750px; max-height: 850px;" 
                        src="<?php echo $tabla['foto'];?>">
                    </a>
                    <div class="clearfix">
                        <a style="text-align: left;"> Fecha de cierre: <?php echo $tabla['fecha_fin']?></a>
                        <?php if ($tabla['id_registrado'] == $_SESSION['id_usuario']){ ?>
                            <?php mostrarUsuarioCreador($tabla['id_gauchada']);
                                mostrarModificarGauchada($tabla['id_gauchada']);?>
                        <?php }
                        else{
                            consultaUsuarioPostulado($_SESSION['nombreUsuario'],$_SESSION['id_usuario'],
                            $tabla['id_gauchada']);
                        }?> 
                   </div>
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
