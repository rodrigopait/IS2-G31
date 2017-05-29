<!DOCTYPE html>
<html lang="en">
<?php include("conexion.php");
session_start();
if (isset($_POST['categoria'])){ 
    $categoria = $_POST['categoria']; 
    setcookie('cateoria',$categoria,time()+4800);
}
if (isset($_POST['titulo'])){
    $titulo = $_POST['titulo'];
    setcookie('titulo',$titulo,time()+4800);
}
if (isset($_POST['ciudad'])){
    $ciudad = $_POST['ciudad'];
    setcookie('ciudad',$ciudad,time()+4800);
}
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
    <?php include("navbar.php"); ?> 
    
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
                <form method="POST" action="search.php">
                    <div class="input-group">
                        <span class="input-group-addon">Categoria</span>
                        <input type="text" class="form-control" name="categoria" value="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Ciudad</span>
                        <input type="text" class="form-control" name="ciudad" value="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Titulo</span>
                        <input type="text" class="form-control" name="titulo" value="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Filtrar</button>
                    </div>
                </form>
                <?php 
                if( isset($_POST['categoria']) && isset($_POST['ciudad']) && isset($_POST['titulo'])) {
                $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE categoria = '$categoria' AND ciudad = '$ciudad' AND titulo like %'$titulo'%"); 
                }
                else {
                    if( isset($_POST['categoria']) && isset($_POST['ciudad']) && !isset($_POST['titulo'])){
                $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE categoria = '$categoria' AND ciudad = '$ciudad'");}
                    else {
                        if( isset($_POST['categoria']) && !isset($_POST['ciudad']) && !isset($_POST['titulo'])){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE categoria = '$categoria'");}
                    else {
                        if( !isset($_COOKIE['categoria']) && !isset($_COOKIE['ciudad']) && !isset($_COOKIE['titulo'])){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto ");}
                    else {
                        if( !isset($_POST['categoria']) && isset($_POST['ciudad']) && !isset($_POST['titulo'])){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE ciudad = '$ciudad' ");}
                    else {
                        if( isset($_POST['categoria']) && !isset($_POST['ciudad']) && isset($_POST['titulo'])){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE categoria= '$categoria' AND titulo= '$titulo'");}
                     else {
                        if( !isset($_POST['categoria']) && isset($_POST['ciudad']) && isset($_POST['titulo'])){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE ciudad = %'$ciudad'% AND titulo= '$titulo'");}
                     else {
                        if( !isset($_POST['categoria']) && !isset($_POST['ciudad']) && isset($_POST['titulo'])){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE titulo= '$titulo'");}
                    }}}}}}}
                while ($tupla = mysql_fetch_array($consul_gauchada)){ ?>
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
                        <?php echo $tupla['ciudad'];?> el <?php echo $tupla['fecha_ini']; ?>
                    </p>
                </div>
                <hr>
                <?php $tupla = mysql_fetch_array($consul_gauchada);?>
                <div class="post-preview">
                    <a href="post.php?variable=<?php echo $tupla['id_gauchada'];?>">
                        <h2 class="post-title">
                            <?php echo $tupla['titulo'];?>
                            <img href="post.php?variable=<?php echo $tupla['id_gauchada'];?>" 
                            src="<?php echo $tupla['foto']?>" width="120" height="100" style="position: absolute;
                            right: 40px;">
                        </h2>
                    </a>
                    <p class="post-meta">Publicado en 
                        <?php echo $tupla['ciudad'];?> el <?php echo $tupla['fecha_ini']; ?>
                    </p>
                </div>
                <hr><?php } ?>
                <!-- Pager -->
<!--                <div class="clearfix">
                    <a class="btn btn-secondary float-right" href="#">ver mas &rarr;</a>
                </div>
 -->            </div>
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
