<!DOCTYPE html>
<html lang="en">
<?php include("conexion.php");
include("consultasSQL.php");
session_start();
if (!empty($_POST['categoria'])){
    setcookie('categoria',$_POST['categoria'],time()+4800);
    $categoria = $_POST['categoria'];
}
if (!empty($_POST['titulo'])){
    setcookie('titulo',$_POST['titulo'],time()+4800);
    $titulo = $_POST['titulo'];
}
if (!empty($_POST['ciudad'])){
    setcookie('ciudad',$_POST['ciudad'],time()+4800);
    $ciudad = $_POST['ciudad'];
}
if (!empty($_COOKIE['categoria'])){
    $categoria = $_COOKIE['categoria'];
}
if (!empty($_COOKIE['titulo'])){
    $titulo = $_COOKIE['titulo'];
}
if (!empty($_COOKIE['ciudad'])){
    $ciudad = $_COOKIE['ciudad'];
}
if (!empty($_POST['eliminarCategoria'])){
    setcookie('categoria',"",time()-48000);
    $categoria= "";
    header('Location: search.php');
}
if (!empty($_POST['eliminarCiudad'])){
    setcookie('ciudad',"",time()-48000);
    $ciudad= "";
    header('Location: search.php');
}
if (!empty($_POST['eliminarTitulo'])){
    setcookie('titulo',"",time()-48000);
    $titulo= "";
    header('Location: search.php');
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
                <form method="post" action="search.php">
                    <div class="input-group" style="margin-bottom: 1%;">
                        <span class="input-group-addon">Categoria</span>
                        <input list="browsers" class="form-control" name="categoria" 
                        <?php if(!empty($categoria)){?> placeholder="<?php echo $categoria;}?>">
                        <datalist id="browsers">
                          <?php $consulta = categorias();
                             while ($tabla = mysql_fetch_array($consulta)){?>
                            <option value="<?php echo $tabla['tipocategoria']?>">
                            <?php }?> 
                        </datalist>
                        <?php if(!empty($categoria)){?>
                            <button type="submit" class="btn btn-secondary" name="eliminarCategoria" value="true">
                            <i class="fa fa-search-minus" aria-hidden="true"></i> Eliminar Filtro</button>
                        <?php }?>
                    </div>
                    <div class="input-group" style="margin-bottom: 1%;">
                        <span class="input-group-addon">Ciudad</span>
                        <input type="text" class="form-control" name="ciudad" value=""
                        <?php if(!empty($ciudad)){?> placeholder="<?php echo $ciudad;}?>">
                        <?php if(!empty($ciudad)){?>
                            <button type="submit" class="btn btn-secondary" name="eliminarCiudad" value="true">
                            <i class="fa fa-search-minus" aria-hidden="true"></i> Eliminar Filtro</button>
                        <?php }?>
                    </div>
                    <div class="input-group" style="margin-bottom: 1%;">
                        <span class="input-group-addon">Titulo</span>
                        <input type="text" class="form-control" name="titulo" value=""
                        <?php if(!empty($titulo)){?> placeholder="<?php echo $titulo;}?>">
                        <?php if(!empty($titulo)){?>
                            <button type="submit" class="btn btn-secondary" name="eliminarTitulo" value="true">
                            <i class="fa fa-search-minus" aria-hidden="true"></i> Eliminar Filtro</button>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" style="margin-left: 36%">
                        <i class="fa fa-search-plus" aria-hidden="true"></i> Agregar Filtro</button>
                    </div>
                </form>
                <?php
                if( (!empty($_POST['categoria'])) AND (!empty($_POST['ciudad'])) AND (!empty($_POST['titulo'])) AND
                    (!empty($_COOKIE['categoria'])) AND (!empty($_COOKIE['ciudad'])) AND (!empty($_COOKIE['titulo']))){
                $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto INNER JOIN categau ON gauchada.id_gauchada = categau.id_gauchada INNER JOIN categoria ON categau.id_categoria = categoria.id_cat WHERE tipocategoria = '$categoria' AND ciudad = '$ciudad' AND titulo LIKE '%$titulo%'"); 
                }
                else {
                    if( (!empty($_POST['categoria']) && !empty($_POST['ciudad']) && empty($_POST['titulo'])) || 
                        (!empty($_COOKIE['categoria']) && !empty($_COOKIE['ciudad']) && empty($_COOKIE['titulo']))){
                $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto INNER JOIN categau ON gauchada.id_gauchada = categau.id_gauchada INNER JOIN categoria ON categau.id_categoria = categoria.id_cat WHERE tipocategoria = '$categoria' AND ciudad = '$ciudad'");}
                    else {
                        if( (!empty($_POST['categoria']) && empty($_POST['ciudad']) && empty($_POST['titulo'])) ||
                            (!empty($_COOKIE['categoria']) && empty($_COOKIE['ciudad']) && empty($_COOKIE['titulo']))){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto INNER JOIN categau ON gauchada.id_gauchada = categau.id_gauchada INNER JOIN categoria ON categau.id_categoria = categoria.id_cat WHERE tipocategoria = '$categoria'");}
                    else {
                        if( (empty($_POST['categoria']) && empty($_POST['ciudad']) && !empty($_POST['titulo'])) ||
                            (empty($_COOKIE['categoria']) && empty($_COOKIE['ciudad']) && !empty($_COOKIE['titulo']))){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE titulo LIKE '%$titulo%'");}
                    else {
                        if( (empty($_POST['categoria']) && !empty($_POST['ciudad']) && empty($_POST['titulo'])) ||
                            (empty($_COOKIE['categoria']) && !empty($_COOKIE['ciudad']) && empty($_COOKIE['titulo']))){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE ciudad = '$ciudad' ");}
                    else {
                        if( (!empty($_POST['categoria']) && empty($_POST['ciudad']) && !empty($_POST['titulo'])) ||
                        (!empty($_COOKIE['categoria']) && empty($_COOKIE['ciudad']) && !empty($_COOKIE['titulo']))){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto INNER JOIN categau ON gauchada.id_gauchada = categau.id_gauchada INNER JOIN categoria ON categau.id_categoria = categoria.id_cat WHERE tipocategoria = '$categoria' AND titulo LIKE '%$titulo%'");}
                     else {
                        if( (empty($_POST['categoria']) && !empty($_POST['ciudad']) && !empty($_POST['titulo'])) ||
                        (empty($_COOKIE['categoria']) && !empty($_COOKIE['ciudad']) && !empty($_COOKIE['titulo']))){
                     $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto WHERE ciudad = '$ciudad' AND titulo LIKE '%$titulo%'");}
                     else {
                        $consul_gauchada = mysql_query("SELECT * FROM gauchada INNER JOIN foto ON gauchada.id_foto = foto.id_foto ");
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
               <?php } ?> 
           </div>
        </div>
    </div>

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
