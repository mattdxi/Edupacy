<?php
error_reporting(E_ALL ^ E_NOTICE);
//Recuperacion de de los datos enviados por post
$id_cita = $_POST['id_cita'];
//comprobacion de llamado
if(empty($id_cita)) {
  //Llamada a la vista
  require_once("./Views/consulta_view.php");
}else {
  require_once("../Models/cita_model.php");
  $cita = new cita_model();
  header("Content-Type: application/json");
  //Variable de resultado
  $datos = $cita->get_cita($id_cita);
  echo json_encode($datos);
}
?>
