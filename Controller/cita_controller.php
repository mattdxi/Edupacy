<?php
error_reporting(E_ALL ^ E_NOTICE);
//Recuperacion de de los datos enviados por post
$id_tramite = $_POST['id_tramite'];
$id_cita = $_POST['id_cita'];
$fecha= $_POST['fecha'];
$hora = $_POST['hora'];
$nombres =$_POST['nombres'];
$apellidos = $_POST['apellidos'];
$telefonos = $_POST['telefonos'];
$Op = $_POST['Opcion'];
$cita;
//comprobacion de llamado
if(empty($Op)) {
  //Llamada a la vista
  require_once("./Views/cita_view.php");
}else {
  require_once("../Models/cita_model.php");
  $cita = new cita_model();
  header("Content-Type: application/json");
  //Variable de resultado
  $resultado;
  switch ($Op) {
    case '1':
      $resultado = $cita->set_cita($fecha, $hora, $id_tramite);
      break;
    case '2':
      $resultado = $cita->update_cita($id_cita, $nombres, $apellidos, $telefonos);
      break;
    case '3':
      $resultado = $cita->update_cita2($id_cita, $nombres, $apellidos, $telefonos, $fecha, $hora, $id_tramite);
      break;
    case '4':
      $resultado = $cita->get_cita($id_cita);
      break;
    case '5':
      $resultado = $cita->delete_cita($id_cita);
      break;
  }
  echo json_encode($resultado);
}
?>
