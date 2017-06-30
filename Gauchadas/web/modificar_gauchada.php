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
                        <h1 style="text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Modificar Gauchada</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <?php 
                $id_gauchada = ($_GET['id_gauchada']);
                $tabla=consultarGauchada($id_gauchada); 
                ?>
                <form method="POST" action="modificar-check.php?id_gauchada=<?php echo $id_gauchada?>" enctype="multipart/form-data">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-font" aria-hidden="true"></i> Título</label>
                            <input type="text" class="form-control" required
                            title="Por favor ingrese un título" name="title" value="<?php echo $tabla['titulo'] ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-pencil" aria-hidden="true"></i> Descripción</label>
                            <textarea type="text" rows="5" class="form-control" value="<?php echo $tabla['descripcion'] ?>" required  title="Por favor ingrese su descripción" name="desc" 
                            value=""><?php echo $tabla['descripcion'] ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-globe" aria-hidden="true"></i> Ciudad</label>
                            <input type="text" class="form-control" required
                            title="Por favor ingrese su ciudad" name="city" value="<?php echo $tabla['ciudad'] ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de fin</label>
                            <input type="date" class="form-control" required
                            title="Por favor ingrese la fechad de fin de la gauchada" name="fecha_fin" value="<?php echo $tabla['fecha_fin'] ?>">
                        </div>
                    </div>
<!--                     Probar DATALIST mas adelante-->                   
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <select name="categoria">
                                <?php $consulta = mysql_query("SELECT * FROM categoria");
                                while ($tabla = mysql_fetch_array($consulta)){?>
                                <option value="<?php echo $tabla['id_cat'] ?>"><?php echo $tabla['tipocategoria']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-picture-o" aria-hidden="true"></i> Foto</label>
                            <input name="image" value="<?php echo $tabla['id_foto']; ?>" type="file">
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Modifdicar</button>
                        <button type="reset" class="btn btn-secondary">Restablecer</button>
                    </div>
                    <?php ?>
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
