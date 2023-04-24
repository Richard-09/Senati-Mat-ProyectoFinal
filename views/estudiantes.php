<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false){
  header('Location:../');
}
?>

<!doctype html>
<html lang="en">
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  <!-- Lightbox CSS -->
  <link rel="stylesheet" href="../dist/lightbox2/src/css/lightbox.css">
</head>

<body>

  <?php require_once 'cabecera.php'; ?>

  <div class="container mt-4">
    <div class="card border-success">
      <div class="card-header bg-success text-light">
        <div class="row">
            <div class="col-md-6">
              <h4><strong>Lista de Estudiantes</strong></h4>
            </div>
            <div class="col-md-6 text-end">
              <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal-estudiante">Registrar</button>
            </div>
          </div>
      </div>
      <div class="card-body ">
        <div class="container mt-3">
          <table id="tabla-estudiantes" class="table table-striped table-lg text-center table-bordered border-dark">
            <thead class=" table-success table-bordered border-dark">
              <tr>
                <th style="width: 5%">#</th>
                <th style="width: 25%">Apellidos y Nombres</th>
                <th style="width: 15%">Tipo</th>
                <th style="width: 10%">Documento</th>
                <th style="width: 15 %">Nacimiento</th>
                <th style="width: 20%">Carrera</th>
                <th style="width: 10%">Operaciones</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modal-estudiante" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-bg-secondary">
          <h5 class="modal-title" id="modalTitleId">Complete el Registro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" autocomplete="off" id="formulario-estudiantes" enctype="multipart/form-data">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" class="form-control form-control-sm" autofocus>
              </div>
              <div class="mb-3 col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" id="nombres" class="form-control form-control-sm" autofocus>
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="tipodocumento" class="form-label">Tipo Documento:</label>
                <select id="tipodocumento" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                  <option value="D">DNI</option>
                  <option value="C">Carnet de Extranjería</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="nrodocumento" class="form-label">N° Documento:</label>
                <input type="text" id="nrodocumento" class="form-control form-control-sm" autofocus>
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="fechanacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control form-control-sm" id="fechanacimiento">
              </div>
              <div class="mb-3 col-md-6">
                <label for="sede" class="form-label">Sede:</label>
                <select id="sede" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="escuela" class="form-label">Escuela:</label>
                <select id="escuela" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="carrera" class="form-label">Carreras:</label>
                <select id="carrera" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <label for="fotografia" class="form-label">Fotografía:</label>
              <input type="file" id="fotografia" accept=".jpg" class="form-control form-control-sm" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="cancelar" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardar-estudiante">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!--Sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Lightbox JS -->
  <script src="../dist/lightbox2/src/js/lightbox.js"></script>

  <script>
    $(document).ready(function (){

      function obtenerSedes(){
        $.ajax({
          url: '../controllers/sede.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#sede").html(result);
          }
        });
      }

      function obtenerEscuelas(){
        $.ajax({
          url: '../controllers/escuela.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#escuela").html(result);
          }

        });
      }

      function registrarEstudiante(){
        //Enviaremos los datos dentro de un OBJETO
        //Para adjuntar algún archico multimedia(se conoce como BINARIO) se hace con formData:
        var formData = new FormData();

        formData.append("operacion", "registrar");
        formData.append("apellidos", $("#apellidos").val());
        formData.append("nombres", $("#nombres").val());
        formData.append("tipodocumento", $("#tipodocumento").val());
        formData.append("nrodocumento", $("#nrodocumento").val());
        formData.append("fechanacimiento", $("#fechanacimiento").val());
        formData.append("idcarrera", $("#carrera").val());
        formData.append("idsede", $("#sede").val());
        formData.append("fotografia", $("#fotografia")[0].files[0]);
      
        $.ajax({
          url: '../controllers/estudiante.controller.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          success: function(){
            $("#formulario-estudiantes")[0].reset();
            $("#modal-estudiante").modal("hide");
            alert("Guardando correctamente");
          }
        });
      }

      function preguntarRegistro(){
        Swal.fire({
          icon: 'question',
          title: 'Matriculas',
          text:'¿Estas seguro de registrar al estudiante?',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#EE8509',
          showCancelButton: true,
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          //Identificando la acción del usuario
          if(result.isConfirmed){
            registrarEstudiante();
          }
        });
      }
    
      function CancelarRegistro(){
        Swal.fire({
          title: 'Proceso cancelado',
          icon: 'warning',
          timer: 1500,
          timerProgressBar: true,
          toast: true,
          showConfirmButton: false,
          position: 'bottom-end',
        })
        $("#formulario-estudiantes")[0].reset();
        $("#modal-estudiante").modal("hide");
        mostrarEstudiantes();
      }

      $("#guardar-estudiante").click(preguntarRegistro);
      $("#cancelar").click(CancelarRegistro);

      //Al cambiar una escuela, se actualizarán las carreras
      $("#escuela").change(function (){
        const idescuelaFiltro = $(this).val();

        $.ajax({
          url: '../controllers/carrera.controller.php',
          type: 'POST',
          data: {
            operacion     :'listar',
            idescuela     : idescuelaFiltro  
          },
          dataType        : 'text',
          success         : function(result){
            $("#carrera").html(result);
          }     
        })
      });

      //Predeterminamos un control dentro del modal
      $("#modal-estudiante").on("shown.bs.modal", event => {
        $("#apellidos").focus();

        //EVENTOS
        obtenerSedes();
        obtenerEscuelas();
      });

      function mostrarEstudiantes(){
        $.ajax({
          url: '../controllers/estudiante.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#tabla-estudiantes tbody").html(result);
          }
        });
      }

      $("#tabla-estudiantes tbody").on("click", ".eliminar", function (){
        Swal.fire({
          title: '¿Eliminar?',
          showDenyButton: true,
          confirmButtonText: 'Aceptar',
          denyButtonText: `Cancelar`,
        }).then((result) => {
          if (result.isConfirmed) {
            const idestudiante = $(this).attr("data-codigo");

            const datos ={
              'operacion'       :   'eliminar',
              'idestudiante'   :   idestudiante
            };

            $.ajax({
              url: '../controllers/estudiante.controller.php',
              type: 'POST',
              data: datos,
              success: function (e){
                mostrarEstudiantes();
              }
            });
          }
        })
      });

      mostrarEstudiantes();

    });
  </script>

</body>

</html>