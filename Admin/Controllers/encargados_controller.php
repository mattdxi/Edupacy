<?php
error_reporting(E_ALL ^ E_NOTICE);
//Recuperacion de de los datos enviados por post
$id_cita = $_POST['id_cita'];
$fecha= $_GET['fecha'];
$Op = $_POST['Opcion'];
$cita;
//comprobacion de llamado
if(empty($Op)) {
  //Llamada a la vista
  /*require_once("./Models/citas_model.php");
  $cita = new cita_model();
  $datos = $cita->get_citas($fecha);*/
  require_once("./Views/encargados_view.php");
}else {
  require_once("../Models/citas_model.php");
  $cita = new cita_model();
  //Variable de resultado
  $resultado;
  switch ($Op) {
    case '1':
      $datos = $cita->get_citas($fecha);
      require_once("./Views/citas_view.php");
      break;
    case '2':
      header("Content-Type: application/json");
      $resultado = $cita->delete_cita($id_cita);
      echo json_encode($resultado);
      break;
    case '3':
      header("Content-Type: application/json");
      $resultado = $cita->update_cita($id_cita);
      echo json_encode($resultado);
      break;
  }
}
?>
