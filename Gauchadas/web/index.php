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
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    }
    
    ?>
    
        <!-- Page Header -->
    <header class="intro-header" style="background-image: url(img/fondo-gauchada.png); background-size: contain;
    background-position-y: 0; height: 333px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="site-heading" style="background-image: url(img/logo-gauchadas.png);
                    background-repeat: repeat-x; background-position: center; width: 90%; margin-left: 7%;
                    padding-bottom: 16%;">
                        <h1>Gauchadas</h1>
                        <span class="subheading" style="font-weight: bold; padding-top: 1%">
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
                <?php $consul_gauchada = mysql_query("SELECT * FROM gauchada");?>
                <div class="post-preview">
                    <?php $tupla = mysql_fetch_array($consul_gauchada);?>
                    <a href="post.php?variable=<?php echo $tupla['id_gauchada'];?>&&postulado=false">
                        <h2 class="post-title">
                            <?php echo $tupla['titulo'];?>
                        </h2>
                        <h3 class="post-subtitle"></h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#"><?php $vari = $tupla['id_registrado']; 
                        $consul_usuario = mysql_query("SELECT nombre_usu FROM gauchada INNER JOIN registrado ON gauchada.id_registrado=registrado.id_usuario WHERE id_registrado = '$vari'");
                        $tabla = mysql_fetch_array($consul_usuario);
                        echo $tabla[0]?> 
                    </a> on September 24, 2017</p>
                </div>
                <hr>
                <div class="post-preview">
                    <?php $tupla = mysql_fetch_array($consul_gauchada);?>
                    <a href="post.php?variable=<?php echo $tupla['id_gauchada'];?>&&postulado=false">
                        <h2 class="post-title">
                            <?php echo $tupla['titulo'];?>
                        </h2 >
                    </a>
                    <p class="post-meta">Posted by <a href="#"><?php $vari = $tupla['id_registrado']; 
                        $consul_usuario = mysql_query("SELECT nombre_usu FROM gauchada INNER JOIN registrado ON gauchada.id_registrado=registrado.id_usuario WHERE id_registrado = '$vari'");
                        $tabla = mysql_fetch_array($consul_usuario);
                        echo $tabla[0]?> 
                    </a> on September 18, 2017</p>
                </div>
                <hr>
               <div class="post-preview">
                    <?php $tupla = mysql_fetch_array($consul_gauchada);?>
                    <a href="post.php?variable=<?php echo $tupla['id_gauchada'];?>&&postulado=false">
                        <h2 class="post-title">   
                            <?php echo $tupla['titulo'];?>
                        </h2>
                        <h3 class="post-subtitle"></h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#"><?php $vari = $tupla['id_registrado']; 
                        $consul_usuario = mysql_query("SELECT nombre_usu FROM gauchada INNER JOIN registrado ON gauchada.id_registrado=registrado.id_usuario WHERE id_registrado = '$vari'");
                        $tabla = mysql_fetch_array($consul_usuario);
                        echo $tabla[0]?> 
                    </a> on August 24, 2017</p>
                </div>
               <hr>
                <!-- Pager -->
               <div class="clearfix">
                    <a class="btn btn-secondary float-right" href="all-post.php">ver mas &rarr;</a>
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
