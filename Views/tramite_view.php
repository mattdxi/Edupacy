<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
       <ol class="breadcrumb">
              <li><a href="../index.php">Inicio</a></li>
              <li><a href="./Tramites_controller.php">Tramites</a></li>
              <li class="active">Registro de Nacimiento</li>
       </ol>
      
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

      <!-- START THE FEATURETTES -->

      <div class="container-fluid">

          <?php
            $Estado;
              foreach ($datos as $dato) {
                if ($dato["estado"]=="0") {
                  $Estado = "disabled";
                }else{
                  $Estado = "";
                }
                echo "<h1 class='featurette-heading'>";
                echo $dato["tramite"];
                echo "</h1><br>";
                echo "<h4><span class='text-muted'>";
                echo $dato["especificacion"];
                echo "</span></h4>";
              }
              echo "<ol>";
              foreach ($reqs as $requisito) {
                echo "<li>";
                echo $requisito["Descripcion"];
                echo "</li>";
              }
              echo "</ol>";
              echo "<center><a class='btn btn-primary {$Estado}' href='?Opcion=Cita' role='button'>Agendar Cita</a></center>";
          ?>
      </div>
  </body>
</html>
