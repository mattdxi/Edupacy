<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
if(empty($_SESSION['logged_in'])){
  $Contenido= "./Controllers/login_controller.php";
}else {
  $Contenido= "./Controllers/inicio_controller.php";
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./Views/img/favicon.ico">

    <title>Registro Civil | Administrador</title>

    <!-- Bootstrap core CSS -->
    <link href="./Views/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./Views/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Views/assets/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="./Views/css/signin.css" rel="stylesheet">
    <link href="./Views/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
  	<div class="Contenido">
      <?php
        include($Contenido);
      ?>
  	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./Views/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./Views/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./Views/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Views/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="./Views/js/admin.js"></script>
  </body>
<?php
//require_once("Views/inicio_view.php");
?>
