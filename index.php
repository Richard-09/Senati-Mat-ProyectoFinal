<?php
session_start();

  if (isset($_SESSION['login']) && $_SESSION['login']){
    header('Location:main.php');
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

<style>
    /* *{
      background-color: #17202A;
    } */
    body{
      background-color: #121313;
    }
</style>

<div style="margin-top:10%;">
  <h4 class="text-light" style="margin:auto; width:11rem;"><strong>Inicio de sesion</strong></h4>
    <div class="card text-light mt-2" style="margin:auto; width:18rem; background-color: #212128;">
      <div class="card-body">
        <form action="">
          <div class="mb3">
            <label for="" class="form-label"><strong>Usuario:</strong></label>
            <input type="text" id="usuario" style="background-color: #000000;" class="form-control form-control-md text-light" autofocus>
          </div>
          <div class="mb3 mt-3">
            <label for="" class="form-label"><strong>Contraseña:</strong></label>
            <input type="password" id="clave" style="background-color: #000000;" class="form-control form-control-md text-light" >
          </div>
          <div class="d-grid gap-2 mt-3">
            <button type="button" class="btn" id="iniciar-sesion" style="background-color:#079D42;" data-bs-dismiss="modal"><strong class="text-light">Iniciar Sesion</strong></button>
          </div>
        </form>
      </div>
   </div>
</div>
  
 <!-- jQuery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
  $(document).ready(function (){

    function iniciarSesion(){
      const usuario = $("#usuario").val();
      const clave = $("#clave").val();

      if (usuario != "" && clave != ""){
        $.ajax({
          url: 'controllers/usuario.controller.php',
          type: 'POST',
          data: {
            operacion     : 'login',
            nombreusuario : usuario,
            claveIngresada: clave
          },
          dataType: 'JSON',
          success: function (result){
            console.log(result);
            if (result["status"]){
              window.location.href = "main.php";
            }else{
              alert(result["mensaje"]);
            }
          }
        });
      }
    }

    $("#iniciar-sesion").click(iniciarSesion);

  })
</script>



</body>
</html>