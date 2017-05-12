<!DOCTYPE html>
<html lang="en">
<?php include("conexion.php");?>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gauchadas - Comparte tu gauchada</title>

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
    <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav" 
    style="background-image: linear-gradient(180deg,rgba(0,0,0,.4) 0,transparent); border: none;">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php">Gauchadas</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="post.php">Sample Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                    <a href="post.php">
                        <h2 class="post-title">
                            <?php $tupla = mysql_fetch_array($consul_gauchada); 
                            echo $tupla['titulo'];?>
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
                    <a href="post.php">
                        <h2 class="post-title">
                            <?php $tupla = mysql_fetch_array($consul_gauchada);
                            echo $tupla['titulo'];?>
                        </h2>
                    </a>
                    <p class="post-meta">Posted by <a href="#"><?php $vari = $tupla['id_registrado']; 
                        $consul_usuario = mysql_query("SELECT nombre_usu FROM gauchada INNER JOIN registrado ON gauchada.id_registrado=registrado.id_usuario WHERE id_registrado = '$vari'");
                        $tabla = mysql_fetch_array($consul_usuario);
                        echo $tabla[0]?> 
                    </a> on September 18, 2017</p>
                </div>
                <hr>
               <div class="post-preview">
                    <a href="post.php">
                        <h2 class="post-title">
                            <?php $tupla = mysql_fetch_array($consul_gauchada);
                            echo $tupla['titulo'];?>
                        </h2>
                        <h3 class="post-subtitle">
                        </h3>
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
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://twitter.com/GauchadasTMPsa">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/Gauchadas-764417733736740/">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/gauchadas">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted" style="background-image: url(img/TMP.png);
                    background-repeat: no-repeat; background-position-x: 35%;
                    background-size: contain;"> Copyright &copy; TMP S.A. 2017</p>
                </div>
            </div>
        </div>
    </footer>

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
