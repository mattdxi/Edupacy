  <body>
       <ol class="breadcrumb">
              <li><a href="./index.php">Inicio</a></li>
              <li class="active">Tr&aacute;mites</li>
        </ol>
      <div class="container-fluid table-tramite">
        <h1>Tr&aacute;mites</h1>
        <table class="table table-hover">
          <tr>
            <th>Tr&aacute;mite</th>
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
