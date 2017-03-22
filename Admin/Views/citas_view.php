<h1 class="page-header">Dashboard</h1>
<h2 class="sub-header">Citas</h2>
<div class="table-responsive">
  <input type="date" id="fecha" onchange="Fecha()" step="1" min="<?php echo date("Y-m-d");?>" >
  <table class="table table-striped">
    <thead>
      <tr>
        <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Tramite</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Folio</th>
        <th>Acciones</th>
        </tr>
      </tr>
    </thead>
    <tbody>
      <?php
        if(!empty($datos)){
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
            echo $dato["id_cita"];
            echo "</td>";
            echo "<td>";
            echo "<a class='btn btn-info btn-sm' href='../PDF/index.php?id_cita={$dato['id_cita']}' role='button' target='_blank'>Imprimir</a>";
            echo "<input onclick='Atender({$dato['id_cita']})' class='btn btn-warning btn-sm' type='button' value='Atender'>";
            echo "<input onclick='Cancelar({$dato['id_cita']})' type='button' class='btn btn-danger btn-sm' value='Cancelar'>";
            echo "</td>";
            echo "</tr>";
          }
        }else if (empty($_GET['fecha'])) {
          echo "Ninguna fecha espeficicada";
        }else{
          echo "Ninguna cita agendada";
        }
      ?>
    </tbody>
  </table>
</div>
