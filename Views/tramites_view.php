<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Lista de Tramites</title>

    <!-- Bootstrap core CSS -->
    <link href="../Views/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../Views/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../Views/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../Views/css/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
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
                <li><a href="../index.php">Inicio</a></li>
                <li class="active"><a href="#">Tramites</a></li>
                <li><a href="#about">Acerca de</a></li>
                <li><a href="#contact">Contacto</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
       <ol class="breadcrumb">
              <li><a href="./index.html">Inicio</a></li>
              <li class="active">Tramites</li>
            </ol>
    </div>
      
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

      <!-- START THE FEATURETTES -->

      <div class="container-fluid table-tramite">
        <h1>Tramites</h1>
        <table class="table table-hover">
          <tr>
            <th>Tramite</th>
            <th>Especificacion</th>
            <th>Estado</th>
            <th>Link</th>
          </tr>
          <?php
            $Estado;
            $Estado2;
            foreach ($datos as $dato) {
                if ($dato["estado"]=="0") {
                  echo "<tr class='danger'>";
                  $Estado ="Inactivo";
                  $Estado2 = "disabled";
                }else{
                  $Estado ="Activo";
                  $Estado2 = "";
                  echo "<tr>";
                }
                
                echo "<td>";
                echo $dato["tramite"];
                echo "</td>";
                echo "<td>";
                echo $dato["especificacion"];
                echo "</td>";
                echo "<td>";
                echo $Estado;
                echo "</td>";
                echo "<td><a href='./tramite_controller.php?id=".$dato["id"]."' class='btn btn-primary btn-sm ".$Estado2."' role='button'>Ver</a></td>";
                echo "</tr>";
            }
          ?>
          <!--
          <tr>
            <td>Registro de Nacimientos</td>
            <td>NIÑOS DE CERO A SEIS MESES, PADRES MAYORES DE EDAD</td>
            <td>Activo</td>
            <td><a href="#" class="btn btn-primary btn-sm" role="button">Ver</a></td>
          </tr>
          <tr class="danger">
            <td>Registro de Nacimientos</td>
            <td>Mayores de 18</td>
            <td>Inactivo</td>
            <td><a href="#" class="btn btn-primary btn-sm disabled" role="button">Ver</a></td>
          </tr> -->
        </table>
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    <div class="container marketing">
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Regresar Arriba</a></p>
        <p>&copy; 2017 EDUPACY &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a> &middot; <a href="http://semver.org/lang/es/">Versionado</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../Views/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../Views/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../Views/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../Views/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
