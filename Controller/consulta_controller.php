<?php
error_reporting(E_ALL ^ E_NOTICE);
//Recuperacion de de los datos enviados por post
$id_cita = $_GET['id_cita'];
//comprobacion de llamado
if(!empty($id_cita)) {
  require_once("./Models/consulta_model.php");
  $cita = new cita_model();
  $datos = $cita->get_cita($id_cita);
}
  require_once("./Views/consulta_view.php");
  //echo json_encode($datos);
?>
