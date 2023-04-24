<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="margin-left: 10px;">Senati-Mat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../main.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./colaboradores.php">Colaboradores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./estudiantes.php">Estudiantes</a>
        </li>
      </ul>
        <ul class="navbar-nav" style="margin-right: 70px;">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php
                echo $_SESSION['nombreusuario'];
              ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a href="../controllers/usuario.controller.php?operacion=finalizar"class="dropdown-item">Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>  
    </div>
</nav>