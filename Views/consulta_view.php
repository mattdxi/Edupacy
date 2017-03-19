<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
       <ol class="breadcrumb">
              <li><a href="index.php">Inicio</a></li>
              <li><a href="?Opcion=Tramites">Tramites</a></li>
              <li class="active">Consulta de Cita</li>
       </ol>
      <div class="container-fluid table-tramite">
        <h1>Consulta de Cita</h1>
        <div class="panel panel-primary">
        <div class="panel-heading">Paso 1: Ingresa tus datos</div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Solicitante:</label>
              <div class="col-sm-2">
                  <input id="folio" type="text" class="form-control" placeholder="Folio de Cita" required>
              </div>
              <div class="col-sm-2">
                <center>
                  <input id="buscar" type="button" class="btn btn-info btn-sm" value="Buscar">
                </center>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-primary">
        <div class="panel-heading">Resultados de Busqueda:</div>
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
              echo "</tr>";
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
                echo "</tr>";
              }
              echo "<center><a class='btn btn-primary' href='#' role='button'>Agendar Cita</a></center>";
            }
          ?>
          </table>
        </div>
        </div>
      </div>
  </body>
</html>
