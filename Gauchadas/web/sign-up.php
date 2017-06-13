<!DOCTYPE html>
<html lang="en">

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
                        <a class="nav-link page-scroll" href="sign-in.php">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesión</a>
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
                <form name="registrerUser" method="POST" action="sign-up-check.php">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-user" aria-hidden="true"></i> Nombre de usuario</label>
                            <input type="text" class="form-control" placeholder="Nombre de usuario" 
                            name="name" value="" pattern="[a-z]{3,15}" 
                            title="Por favor ingrese su nombre en miniscula de al menos tres (3) y maximo quince (15) caracteres">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label><i class="fa fa-key" aria-hidden="true"></i> Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="pw" value=""
                            pattern=".{6,}" title="Por favor ingrese su contraseña de al menos seis (6) caracteres.">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-envelope-o" aria-hidden="true"></i> Correo electrónico</label>
                            <input type="email" class="form-control" placeholder="Correo electrónico" 
                            name="email" value="" title="Por favor ingrese algo como ejemplo@gauchadas.com"
                            required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label><i class="fa fa-phone" aria-hidden="true"></i> Telefono</label>
                            <input type="tel" class="form-control" placeholder="Telefono" optional
                            pattern="[0-9]+" tittle="Por favor ingrese su numero de telefono" name="phone" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label><i class="fa fa-globe" aria-hidden="true"></i> Ciudad</label>
                            <input type="text" class="form-control" placeholder="Ciudad" required
                            title="Por favor ingrese su ciudad" name="city" value="">
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Regístrate</button>
                        <button type="reset" class="btn btn-secondary">Restablecer</button>
                    </div>
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
