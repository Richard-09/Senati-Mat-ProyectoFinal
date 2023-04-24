<?php
  session_start();
  if (!isset($_SESSION['login']) || $_SESSION['login'] == false){
    header('Location:../');
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="margin-left: 10px;">Senati-Mat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="main.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./views/colaboradores.php">Colaboradores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./views/estudiantes.php">Estudiantes</a>
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
              <li><a href="./controllers/usuario.controller.php?operacion=finalizar"class="dropdown-item">Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>  
    </div>
</nav>

  <div class="container py-4">
    <div class="p-5 mb-4 bg-light border rounded-4">
      <div class="container-fluid py-5 text-center">
        <h2 class="display-5 fw-bold">Sistema de matrícula</h2>
        <p class="col-md-12 fs-4">Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
        <div class="mt-5">
          <a href="views/colaboradores.php"class="btn btn-outline-primary btn-lg" type="button">Colaboradores</a>
          <a href="views/estudiantes.php"class="btn btn-outline-success btn-lg" type="button">Estudiantes</a>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>