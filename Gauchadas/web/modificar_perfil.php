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
    <header class="intro-header" style="background-image: url(img/fondo-gauchada.png); background-size: cover;
    background-position-y: 0; height: 333px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="site-heading" style="background-image: url(img/logo-gauchadas.png);
                    background-repeat: repeat-x; background-position: center; width: 90%; margin-left: 7%;
                    padding-bottom: 16%;">
                        <h1 style="text-shadow: black;color: #fff;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Modificar Perfil</h1>
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
                $id_usuario = ($_GET['variable']);
                $usuario = getUsuario($id_usuario);
                ?>
                <form method="POST" action="modificarusuario-check.php?usuario=<?php echo $id_usuario?>" enctype="multipart/form-data">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-font" aria-hidden="true"></i> Nombre</label>
                            <input type="text" class="form-control" required
                            title="Por favor ingrese un nombre" name="nombreusuario" value="<?php echo $usuario['nombre_usu'] ?>" disabled>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-key" aria-hidden="true"></i> Contraseña</label>
                            <input type="password" class="form-control" required title="Por favor ingrese una contraseña" name="password" value="<?php echo $usuario['password']?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-envelope-o" aria-hidden="true"></i> Correo electrónico</label>
                            <input type="email" class="form-control" value="<?php echo $usuario['mail'] ?>" 
                            name="email" value="" title="Por favor ingrese algo como ejemplo@gauchadas.com"
                            required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-calendar" aria-hidden="true"></i> Ciudad</label>
                            <input type="text" class="form-control" required
                            title="Por favor ingrese su ciudad" name="ciudad" value="<?php echo $usuario['ciudad'] ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-calendar" aria-hidden="true"></i> Telefono</label>
                            <input type="number" class="form-control" name="telefono" value="<?php echo $usuario['telefono'] ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-picture-o" aria-hidden="true"></i> Foto</label>
                            <input name="image" value="<?php echo $usuario['id_foto']; ?>" type="file">
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Modificar</button>
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
