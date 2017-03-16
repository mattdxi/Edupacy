<?php
//Llamada al modelo
require_once("../Models/tramite_model.php");
$tramite=new tramite_model();
//Recuperacion de id del tramite
$id = $_GET['id'];
$datos=$tramite->get_tramite($id);
$reqs = $tramite->get_requisitos($id);
//Llamada a la vista
require_once("../Views/tramite_view.php");
?>