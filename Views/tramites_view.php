<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
       <ol class="breadcrumb">
              <li><a href="./index.html">Inicio</a></li>
              <li class="active">Tramites</li>
            </ol>
    </div>
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
                echo "<td><a href='?Opcion=Tramite&id=".$dato["id"]."' class='btn btn-primary btn-sm ".$Estado2."' role='button'>Ver</a></td>";
                echo "</tr>";
            }
          ?>
        </table>
  </body>
</html>
