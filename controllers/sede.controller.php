<?php

require_once '../models/Sede.php';

if(isset($_POST['operacion'])){

  $sede = new Sede();

  if ($_POST['operacion'] == 'listar'){
    
    $data = $sede->listarSedes();

    if ($data){
      echo"<option value='' selected>Seleccione</option>";
      foreach($data as $registro){
        echo "<option value = '{$registro['idsede']}'>{$registro['sede']}</option>";
      }
    }else{
      echo "<option value= ''>No encontramos datos</option>";
    }
  }




}