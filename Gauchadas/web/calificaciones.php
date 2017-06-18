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
                        while ($tupla = mysql_fetch_array($consulta)){ ?>
                            <div class="post-preview">
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
                                    <?php echo $tupla['ciudad'];?> el <?php echo $tupla['fecha_ini'];?></p>
                            </div>
                            <div class="post-preview">
                                <h2 class="post-title" style="display:flow-root;">
                                <?php echo $tupla['nombre_usu'];?></h2>
                                <div class="progress">
                                    <?php mostrarBarraDeProgreso($tupla['id_rep']);?>
                                </div>
                                <a style="color:#777">Reputacion :  </a><?php echo $tupla['descripcion'];?>
                                <p class="post-meta">Vive en :  
                                    <a style="margin-right: 10%"> <?php echo $tupla['ciudad'];?></a>Email : <a> <?php echo $tupla['mail']; ?></a>
                                </p>
                            </div>
                            <form method="POST" action="calificaciones-check.php?id_gauchada=<?php echo $tupla['id_gauchada'];?>">
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls">
                                        <label><i class="fa fa-commenting-o" aria-hidden="true"></i> Reseña</label>
                                        <textarea rows="3" name="text" class="form-control" placeholder="Reseña" required title="Por favor ingrese su reseña."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <select name="puntuacion" style="width: 100%">
                                        <?php $consul = consultaCalificaion();
                                        while ($tabla = mysql_fetch_array($consul)){?>
                                            <option value="<?php echo $tabla['id_puntuacion'];?>">
                                            <?php echo $tabla['descripcion']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group" style="margin-left: 41%">
                                    <button type="submit" class="btn btn-secondary">Calificar</button>
                                </div>
                            </form>
                            <hr>
                        <?php } ?>
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
                        while ($tupla = mysql_fetch_array($consulta)){ ?>
                            <div class="post-preview">
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
                                    <?php echo $tupla['ciudad'];?> el <?php echo $tupla['fecha_ini'];?></p>
                            </div>
                            <div class="post-preview">
                                <h2 class="post-title" style="display:flow-root;">
                                <?php echo $tupla['nombre_usu'];?></h2>
                                <div class="progress">
                                    <?php mostrarBarraDeProgreso($tupla['id_rep']);?>
                                </div>
                                <a style="color:#777">Reputacion :  </a><?php echo $tupla['descripcion'];?>
                                <p class="post-meta">Vive en :  
                                    <a style="margin-right: 10%"> <?php echo $tupla['ciudad'];?></a>Email : <a> <?php echo $tupla['mail']; ?></a>
                                </p>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <i class="text-muted"><u>Reseña:</u></i>
                                    <textarea class="form-control"><?php echo $tupla['comentario'] ?></textarea>
                                    <i class="text-muted"><u>Puntuación:</u></i>
                                    <i><?php echo $tupla[14]?></i>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>
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
