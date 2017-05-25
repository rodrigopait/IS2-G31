<!DOCTYPE html>
<html lang="en">
<?php include("conexion.php");?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
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
    <header class="intro-header" style="background-image: url('img/Valle.JPG')">
        <?php $id = ($_GET['variable']);
        $consulta = mysql_query("SELECT * FROM gauchada WHERE id_gauchada = '$id'");
        $tabla = mysql_fetch_array($consulta);?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading" style="text-align: center;">
                        <h1> <?php echo $tabla['titulo'];?> </h1>
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
                    <p class="caption text-muted" style="text-align: left;"> Fecha de creación:
                        <?php echo $tabla['fecha_ini']?></p>
                        <?php echo $tabla['descripcion']?>
                    <br />
<<<<<<< HEAD
                    <a href="post.php?variable=<?php echo $tabla['id_gauchada'];?>&&postulado=0">
                        <img class="img-responsive" style="margin-bottom: 2%; max-width: 750px; max-height: 850px;" 
                        src="<?php echo $tabla['foto'];?>">
=======
                    <a href="post.php?variable=<?php echo $tabla['id_gauchada'];?>&&postulado=FALSE">
                        <img class="img-responsive" src="img/post-sample-image.jpg" alt="">
>>>>>>> origin/Gauchada
                    </a>
                    <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>
                    <div class="clearfix">
                        <a style="text-align: left;"> Fecha de cierre: <?php echo $tabla['fecha_fin']?></a>
<!--                         <?php $boolean = ($_GET['postulado']); if($boolean){?>
                        <a class="btn btn-secondary float-right" href="post.php?variable=<?php echo $tabla['id_gauchada'];?>&&postulado=TRUE">Postularse  <span class="glyphicon glyphicon-plus-sign"></span></a>
                        <?php } else { ?>
                        <a class="btn btn-secondary float-right" href="post.php?variable=<?php echo $tabla['id_gauchada'];?>&&postulado=TRUE">Postulado  <span class="glyphicon glyphicon-ok-sign"></span></a>
                        <?php }?> 
 -->                   </div>
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
