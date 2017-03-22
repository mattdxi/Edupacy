  <body>
       <ol class="breadcrumb">
              <li><a href="./index.php">Inicio</a></li>
              <li><a href="?Opcion=Tramites">Tr&aacute;mites</a></li>
              <li class="active"><?php echo ($falta_id == "si") ? "" : "{$datos['tramite']}"; ?></li>
       </ol>
      <div class="container-fluid">

          <?php
            if ($falta_id == "si") {
              $Estado;
                if ($datos["estado"]=="0") {
                  $Estado = "disabled";
                }else{
                  $Estado = "";
                }
                echo "<h1 class='featurette-heading'>";
                echo $datos["tramite"];
                echo "</h1><br>";
                echo "<h4><span class='text-muted'>";
                echo $datos["especificacion"];
                echo "</span></h4>";
                echo "<ol>";
                echo "<li>";
                echo $reqs["Descripcion"];
                echo "</li>";
                echo "</ol>";
                echo "<center><a class='btn btn-primary {$Estado}' href='#' role='button'>Agendar Cita</a></center>";
            }else{
              $Estado;
              $id;
              foreach ($datos as $dato) {
                if ($dato["estado"]=="0") {
                  $Estado = "disabled";
                }else{
                  $Estado = "";
                  $id = $dato["id"];
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
              echo "<center><a class='btn btn-primary {$Estado}' href='?Opcion=Cita&Tramite={$id}' role='button'>Agendar Cita</a></center>";
            }
          ?>
      </div>
  </body>
