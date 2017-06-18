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
                        <a class="nav-link page-scroll" href="index.php">
                        <i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="perfil.php?id_usuario=<?php echo $_SESSION['id_usuario']?>">
                        <i class="fa fa-user" aria-hidden="true"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="search.php">
                        <i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="public.php">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Publicar Gauchada</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="comprar-creditos.php">
                        <i class="fa fa-money" aria-hidden="true"></i> Comprar Creditos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </ul>
            </div>
        </div>
    </nav>