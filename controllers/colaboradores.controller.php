<?php
require_once '../models/Colaboradores.php';

if (isset($_POST['operacion'])){

  $colaboradores = new Colaboradores();

  if ($_POST['operacion']=='listar'){
    $data = $colaboradores->listarColaboradores();
      if ($data){
        $numeroFila = 1;
        $botonNulo = " <a href='#' class='btn btn-sm btn-outline-secondary' title='No tiene C.V'><i class='bi bi-file-earmark-pdf-fill'></i></a>";
        foreach($data as $registro){
          echo "
            <tr>
              <td>{$numeroFila}</td>,
              <td>{$registro['personas']}</td>
              <td>{$registro['cargo']}</td>
              <td>{$registro['sede']}</td>
              <td>{$registro['telefono']}</td>
              <td>{$registro['tipocontrato']}</td>
              <td>{$registro['direccion']}</td>
              <td>
                <a href='#' class='btn btn-sm btn-outline-success' title='Editar'><i class='bi bi-pencil'></i></a>           
                <a href='#' class='eliminar btn btn-sm btn-outline-danger'title='Eliminar' data-codigo='{$registro['idcolaborador']}'><i class='bi bi-trash'></i></a>
          ";

          //La segunda parte a Renderizar
          if ($registro['curriculum']== ''){
            echo $botonNulo;
          }else{
            echo "<a href='../views/img/curriculum/{$registro['curriculum']}' target='_blank'class='btn btn-sm btn-outline-primary'title='ver'><i class='bi bi-file-earmark-pdf'></i></a>";
          }

          //La tercera parte a RENDERIZAR,cierre de la fila
          echo "
              </td>
            </tr>
          ";
          $numeroFila++;
        }
      }
  }

  if ($_POST['operacion'] == 'registrar'){

    //PASO 1: Recolectar todos los valores enviados por la vista y almacenarlos en un array asociativo
    // ARRAY ASOCIATIVO:    clave  :  valor
    $datosGuardar = [
      "apellidos"       =>$_POST['apellidos'],
      "nombres"         =>$_POST['nombres'],
      "idcargo"         =>$_POST['idcargo'],
      "idsede"          =>$_POST['idsede'],
      "telefono"        =>$_POST['telefono'],
      "tipocontrato"    =>$_POST['tipocontrato'],
      "curriculum"      =>'',
      "direccion"       => $_POST['direccion']
    ];

    //Vamos a verficar si la vista nos envió una  // NO GUARDAMOS LA IMAGEN SI NO LA RUTA
    if (isset($_FILES['curriculum'])){

      $rutaDestino = '../views/img/curriculum/';
      $fechaActual = date('c'); //C = complete, AÑO/MES/DIA/MINUTO/SEGUNDO
      $nombreArchivo = sha1($fechaActual) . ".pdf";
      $rutaDestino .= $nombreArchivo;

      //Guardamos la en el servidor
      if (move_uploaded_file($_FILES['curriculum']['tmp_name'], $rutaDestino)){
        $datosGuardar['curriculum'] = $nombreArchivo;
      }
    }
    //PASO 2: Enviar el array al método registrar 
    $colaboradores->registrarColaboradores($datosGuardar);
  }

  if ($_POST['operacion'] == 'eliminar'){
    $colaboradores->eliminarColaborador($_POST['idcolaborador']);
  }

}