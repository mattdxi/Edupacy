<?php  
//determinamos el tipo de archivo JSON
header("Content-Type: application/json");
//imprimimos los horarios en formato json
echo json_encode($returnH);
?>