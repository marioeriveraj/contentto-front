<nav id="mainNav" class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo $homef; ?>">
      <img src="./dist/images/Logotipo_white.png" class="img-fluid" alt="Conttento logo" width="175" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="single.php">Reservar</a>
        </li>

        <li class="nav-item btn-1">
          <a class="nav-link" href="conoce.php">Conoce</a>
        </li>
        <?php
        if (isset($_SESSION['usuariocliente'])) {

          echo '
                <li class="nav-item btn-1">
                <a class="nav-link" href="panel_usuario/guardados.php">Guardados</a>
                </li>
                <li class="nav-item btn-1">
                  <a class="nav-link" href="panel_usuario/historial.php">Historial</a>
                </li>
                <li class="nav-item btn-1">
                <a class="nav-link" href="panel_usuario/mensajes.php">Mensajes</a>
                </li> 
                <li class="nav-item btn-1">
                  <a class="nav-link" href="panel_usuario/panel"><i class="fas fa-user-circle"></i>' . $_SESSION['nombrecliente'] . ' '. $_SESSION['apellidoscliente'].'</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">
                 Cerrar Sesion</a>
                </li>
                ';
        } else {
          echo '
                <li class="nav-item">
                <a class="nav-link" href="registro.php">
                <i class="fas fa-user-circle"></i> Registrarse</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="login.php">
                <i class="fas fa-user-circle"></i> Iniciar Sesion</a>
                </li>
                
                ';
        }
        ?>


      </ul>
    </div>
  </div>
</nav>