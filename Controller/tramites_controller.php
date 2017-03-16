<?php
//Llamada al modelo
require_once("../Models/tramites_model.php");
$tra=new tramites_model();
$datos=$tra->get_tramites();
 
//Llamada a la vista
require_once("../Views/tramites_view.php");
?>