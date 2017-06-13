<!DOCTYPE html>
<html lang="en">
<?php include ("conexion.php");
include("funciones.php");
comprobarSession();
?>

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
                <?php mostrarMensajeErrorCreditos($_SESSION['id_usuario']);?>
                <form method="POST" action="public-check.php" enctype="multipart/form-data">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-font" aria-hidden="true"></i> Título</label>
                            <input type="text" class="form-control" placeholder="Título" required
                            title="Por favor ingrese un título" name="title" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Descripción</label>
                            <textarea type="text" rows="5" class="form-control" placeholder="Descripción" required title="Por favor ingrese su descripción" name="desc" value=""></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-globe" aria-hidden="true"></i> Ciudad</label>
                            <input type="text" class="form-control" placeholder="Ciudad" required
                            title="Por favor ingrese su ciudad" name="city" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de fin</label>
                            <input type="date" class="form-control" placeholder="Fecha de fin" required
                            title="Por favor ingrese la fechad de fin de la gauchada" name="fecha_fin" value="">
                        </div>
                    </div>
<!--                     Probar DATALIST mas adelante-->                   
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <select name="categoria">
                                <?php $consulta = mysql_query("SELECT * FROM categoria");
                                while ($tabla = mysql_fetch_array($consulta)){?>
                                <option value="<?php echo $tabla['id_cat']?>"><?php echo $tabla['tipocategoria']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-picture-o" aria-hidden="true"></i> Foto</label>
                            <input name="image" type="file">
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <?php $creditos = cantCreditos($_SESSION['id_usuario']);
                    if($creditos['creditos']>=1){?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Publicar</button>
                        <button type="reset" class="btn btn-secondary">Restablecer</button>
                    </div>
                    <?php }?>
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

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
