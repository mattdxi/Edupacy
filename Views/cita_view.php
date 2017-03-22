<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  </head>
  <body >
       <ol class="breadcrumb">
              <li><a href="./index.php">Inicio</a></li>
              <li><a href="?Opcion=Tramites">Tramites</a></li>
              <li class="active">Cita</li>
        </ol>
        <div class="container-fluid">
           <div id="mensaje"></div>
          <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Paso 1: Seleccion de Fecha y Hora</h3>
              </div>
              <div class="panel-body">
                <div id="datepicker"></div><br>
                <div class="col-sm-2">
                  <div class="form-group form-inline">
                    <label>Seleccione un Horario</label>
                    <select id="slt-horarios" class="form-control"></select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <input class="btn btn-primary" type="button" value="Reservar Horario" id="Reservar">
                    <input class="btn btn-warning" type="button" value="Cambiar Horario" id="Cambiar">
                  </div>
                </div>
              </div>
          </div>
          <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Paso 2: Llena tus Datos</h3>
              </div>
              <div class="panel-body">
              <div class="form-horizontal">
                <input type="hidden" value="<?php echo $_GET['Tramite']?>" id="id_tramite">
                <input type="hidden" value="<?php echo $_GET['id_cita']?>" id="id_cita">
                <input type="hidden" value="" id="op">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Solicitante:</label>
                  <div class="col-sm-2">
                      <input id="Nombres" type="text" class="form-control" placeholder="Nombres" required>
                  </div>
                  <div class="col-sm-4">
                      <input id="Apellidos" type="text" class="form-control" placeholder="Apellidos" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono</label>
                  <div class="col-sm-6">
                      <input type="tel" id="Celular" class="form-control" placeholder="Celular" pattern="[0-9]{10}" required>
                  </div>
                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <center>
                      <button type="submit" class="btn btn-success" id="Registro">Registrar Cita</button>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </body>
</html>
