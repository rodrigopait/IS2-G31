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
    }?>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url(img/fondo-gauchada.png); background-size: contain;
    background-position-y: 0; height: 333px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="site-heading" style="background-image: url(img/logo-gauchada.jpg);
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
            <nav class="navbar navbar-default">
                <div class="nav nav-justified navbar-nav">
                  <form class="navbar-form navbar-search" role="search">
                     <div class="input-group">
                           <div class="input-group-btn">
                                <button type="button" class="btn btn-search btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                    <span class="label-icon">Categoría</span>
                                </button>
                           </div>
                        <div metho="POST" action="filtros-check.php">
                            <input class="form-control" type="text" name="categoria">
                        </div>
                
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-search btn-default">
                                Buscar
                                </button>
                           </div>
                     </div>  
                   </form> 
                </div>
            </nav>
    <nav class="navbar navbar-default">
        <div class="nav nav-justified navbar-nav">
            <form class="navbar-form navbar-search" role="search">
                <div class="input-group">
                
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-search btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                            <span class="label-icon">Ciudad</span>
                        </button>
                   </div>
        
                   <input type="text" class="form-control")>
                
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-search btn-default">
                        Buscar
                        </button>
                    </div>
                </div>  
            </form>   
       </div>
    </nav>
    <nav class="navbar navbar-default">
        <div class="nav nav-justified navbar-nav">
 
            <form class="navbar-form navbar-search" role="search">
                <div class="input-group">
                
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-search btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                            <span class="label-icon">Título</span>
                        </button>
                   </div>
        
                  <?php $input3 = (input type="text" class="form-control")?>
                
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-search btn-default">
                        Buscar
                        </button>
                         
                         
                    </div>
                </div>  
            </form>   
       </div>
    </nav>  
         
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
            <?php $string_titulo = "" ?>;
            <?php $filtro_ciudad mysql_query("SELECT DISTINCT ciudad FROM gauchada");?>
            <?php $filtro_titulo mysql_query("SELECT * FROM gauchada where titulo like '%$string_titulo%'");?>
            <?php $filtro_categoria mysql_query("SELECT * FROM categoria");?>
            <!-- Condiciones Busqueda -->
            <?php if( isset($input1) && isset($input2) && isset($input3)){
            $consul_gauchada = mysql_query("SELECT * FROM gauchada where categoria = $input1 and ciudad = $input2 and titulo like %$input3%") 
            }
             else if( isset($input1) && isset($input2) && !isset($input3)){
            $consul_gauchada = mysql_query("SELECT * FROM gauchada where categoria = $input1 and ciudad = $input2") 
             }
            else if( isset($input1) && !isset($input2) && !isset($input3)){
                 $consul_gauchada = mysql_query("SELECT * FROM gauchada where categoria = $input1") 
             }
             else if( !isset($input1) && !isset($input2) && !isset($input3)){
                 $consul_gauchada = mysql_query("SELECT * FROM gauchada") 
             }
                else if( !isset($input1) && isset($input2) && !isset($input3)){
                 $consul_gauchada = mysql_query("SELECT * FROM gauchada where ciudad=%$input2%") 
             }
                else if( isset($input1) && !isset($input2) && isset($input3)){
                 $consul_gauchada = mysql_query("SELECT * FROM gauchada where categoria= $input1 and titulo= $input3") 
             }
                 else if( !isset($input1) && isset($input2) && isset($input3)){
                 $consul_gauchada = mysql_query("SELECT * FROM gauchada where ciudad = %$input2% and titulo= $input3") 
             }
                 else ( !isset($input1) && !isset($input2) && isset($input3)){
                 $consul_gauchada = mysql_query("SELECT * FROM gauchada where titulo= $input3") 
             }
            ?>
            

                <?php $consul_gauchada = mysql_query("SELECT * FROM registrado INNER JOIN gauchada ON registrado.id_usuario = gauchada.id_registrado INNER JOIN foto ON gauchada.id_foto = foto.id_foto");?>
                <div class="post-preview">
                    <?php $tupla = mysql_fetch_array($consul_gauchada);?>
                    <a href="post.php?variable=<?php echo $tupla['id_gauchada'];?>">
                        <h2 class="post-title">
                            <?php echo $tupla['titulo'];?> 
                            <img href="post.php?variable=<?php echo $tupla['id_gauchada'];?>" 
                            src="<?php echo $tupla['foto']?>" width="120" height="100" style="position: absolute;
                            right: 40px;">
                        </h2>
                        <h3 class="post-subtitle"></h3>
                    </a>
                    <p class="post-meta">Publicado en 
                        <?php echo $tupla['ciudad'];?> el <?php echo $tupla['fecha_ini']; ?>
                    </p>
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

