<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Edupacy</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Ayuda</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perfil<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Configuración</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" id="bt-Salir">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <div id="mensaje"></div>
</nav>
<div id="mensaje"></div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar">
        <?php
          if ($_SESSION['tipo'] == 0) {
            echo "<li><a href='?Opcion=Inicio&Op=Citas'>Citas<span class='sr-only'>(current)</span></a></li>";
            echo "<li><a href='?Opcion=Inicio&Op=Encargados'>Encargados<span class='sr-only'>(current)</span></a></li>";
            echo "<li><a href='?Opcion=Inicio&Op=Tramites'>Tramites<span class='sr-only'>(current)</span></a></li>";
          }elseif ($_SESSION['tipo'] == 1) {
            echo "<li><a href='?Opcion=Inicio&Op=Citas'>Citas<span class='sr-only'>(current)</span></a></li>";
          }elseif ($_SESSION['tipo'] == 3) {
            echo "<li><a href='?Opcion=Inicio&Op=Citas'>Citas<span class='sr-only'>(current)</span></a></li>";
            echo "<li><a href='?Opcion=Inicio&Op=Encargados'>Encargados<span class='sr-only'>(current)</span></a></li>";
            echo "<li><a href='?Opcion=Inicio&Op=Tramites'>Tramites<span class='sr-only'>(current)</span></a></li>";
            echo "<li><a href='?Opcion=Inicio&Op=admin'>Administradores<span class='sr-only'>(current)</span></a></li>";
          }
        ?>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <?php include($Contenido) ?>
    </div>
  </div>
</div>
