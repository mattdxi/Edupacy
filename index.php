<<?php 
	$op = $_GET["Opcion"];
	switch ($op) {
		case 'Tramites':
			$Contenido = "./Controller/tramites_controller.php";
			break;
		case 'Acerca':
			$Contenido = "";
			break;
		case 'Contacto':
			$Contenido = "";
			break;
		
		default:
			$Contenido = "./Views/inicio_view.php";
			break;
	}
?>
<!--DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Tramite</title>

    <!-- Bootstrap core CSS --
    <link href="../Views/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug --
    <link href="../Views/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]--
    <script src="../Views/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template --
    <link href="../Views/css/carousel.css" rel="stylesheet">
  </head>
  <body>
  	<div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">EDUPACY</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="?Opcion=Tramites">Tramites</a></li>
                <li><a href="?Opcion=Acerca">Acerca de</a></li>
                <li><a href="?Opcion=Contacto">Contacto</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  	<div class="Contenido">
  		<?php
  			include($Contenido)
  		?>
  	</div>
  </body -->
<?php
require_once("Views/inicio_view.php");
?>