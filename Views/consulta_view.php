  <body>
       <ol class="breadcrumb">
              <li><a href="index.php">Inicio</a></li>
              <li><a href="?Opcion=Tramites">Tr&aacute;mites</a></li>
              <li class="active">Consulta de Cita</li>
       </ol>
      <div class="container-fluid table-tramite">
        <div id="mensaje"></div>
        <h1>Consulta de Cita</h1>
        <div class="panel panel-primary">
        <div class="panel-heading">Paso 1: Ingresa tus datos</div>
          <div class="panel-body">
            <form class="form-group" action="?Opcion=Consulta" method="get">
              <label class="col-sm-2 control-label">Solicitante:</label>
              <input name='Opcion' type="hidden" value="Consulta">
              <div class="col-sm-2">
                  <input name='id_cita' id="folio" type="text" class="form-control" placeholder="Folio de Cita" value="<?php echo $_GET['id_cita'] ?>" required>
              </div>
              <div class="col-sm-2">
                <center>
                  <input id="buscar" type="submit" class="btn btn-info btn-sm" value="Buscar">
                </center>
              </div>
            </form>
          </div>
        </div>
        <div class="panel panel-primary">
        <div class="panel-heading">Resultados de B&uacute;squeda:</div>
          <div class="panel-body">
            <table class="table">
          <?php
            if (empty($id_cita)) {
              echo "<span>No existen registros de la búsqueda realizada o aun no se ha realizado alguna búsqueda</span>";
            }else{
              echo "<tr>";
              echo "<th>Fecha</th>";
              echo  "<th>Hora</th>";
              echo  "<th>Tramite</th>";
              echo  "<th>Nombres</th>";
              echo  "<th>Apellidos</th>";
              echo  "<th>Telefono</th>";
              echo  "<th>Acciones</th>";
              echo  "</tr>";
              foreach ($datos as $dato) {
                echo "<td>";
                echo $dato["fecha"];
                echo "</td>";
                echo "<td>";
                echo $dato["hora"];
                echo "</td>";
                echo "<td>";
                echo $dato["tramite"];
                echo "</td>";
                echo "<td>";
                echo $dato["nombres"];
                echo "</td>";
                echo "<td>";
                echo $dato["apellidos"];
                echo "</td>";
                echo "<td>";
                echo $dato["telefono"];
                echo "</td>";
                echo "<td>";
                echo "<a class='btn btn-info btn-sm' href='./PDF/index.php?id_cita={$_GET['id_cita']}' role='button' target='_blank'>Imprimir</a>";
                echo "<a class='btn btn-warning btn-sm' href='?Opcion=Cita&Tramite={$dato['id_tramites']}&id_cita={$_GET['id_cita']}' role='button'>Modificar</a>";
                echo "<input id='cancelar' type='button' class='btn btn-danger btn-sm' value='Cancelar'>";
                echo "</td>";
                echo "</tr>";
              }
            }
          ?>
          </table>
        </div>
        </div>
      </div>
  </body>
