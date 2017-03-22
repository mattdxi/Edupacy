<?php
//Llamada al modelo
session_start();
$rfc = $_POST['Rfc'];
$pass = $_POST['Pass'];
$salir = $_POST['Salir'];
$usuario;
if(!empty($rfc) && !empty($pass)){
  require_once("../Models/login_model.php");
  $login= new login_model();
  $usuario = $login->get_usuario($rfc,$pass);
  if($usuario[0]['success'] == 1){
    $_SESSION['logged_in']=true;
    $_SESSION['id_usuario']=$usuario[0]['id'];
    $_SESSION['rfc']=$usuario[0]['rfc'];
    $_SESSION['nombre']=$usuario[0]['nombre'];
    $_SESSION['tipo']=$usuario[0]['tipo'];
    echo json_encode($usuario);
  }
}else if (!empty($salir)) {
  // remove all session variables
  session_unset();
  // destroy the session
  session_destroy();
  
}else{
  require_once("./Views/login_view.php");
}
?>
