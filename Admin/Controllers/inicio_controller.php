<?php
  $Op = $_GET['Op'];
  switch ($Op) {
    case 'Citas':
      $Contenido = "./Controllers/citas_controller.php";
      break;
    case 'Encargados':
      $Contenido = "./Controllers/encargados_controller.php";
      break;
    case 'Tramites':
      $Contenido = "./Views/tramites_view.php";
      break;
    case 'admin':
      $Contenido = "./Views/admin_view.php";
      break;

    default:
      $Contenido = '';
      break;
  }
  require_once("./Views/inicio_view.php");
?>
