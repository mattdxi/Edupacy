<?php
//Llamada al modelo
/*require_once("./Models/tramite_model.php");
$tramite=new tramite_model();
//Recuperacion de id del tramite
$id = $_GET['id'];
//variable para manejar la falta del id
$falta_id = "no";
//validacion del dato que nos mandan
if (empty($id)) {
	$falta_id = "si";
}else{
	$falta_id="no";
}
$datos=$tramite->get_tramite($id);
$reqs = $tramite->get_requisitos($id);*/
//Llamada a la vista
require_once("./Views/acerca_view.php");
?>
