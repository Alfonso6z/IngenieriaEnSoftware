<?= form_open('adminEncuesta/recibirDatosReactivo') ?>
<?php
  $pregunta=array(
    'name' => 'pregunta','placeholder' => ' Escribe Pregunta');
$altaEstudio=site_url('adminEncuesta/altaEstudio',NULL);
$altaReactivo=site_url('adminEncuesta/altaReactivo',NULL);
$cerrarSesion=site_url('login/logout',NULL);
$inicio=site_url('adminEncuesta',NULL);
$rol = $this->session->userdata('rol');
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
?>
<html>
  <head>
    <title>Alta de reactivos</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <!-- Theme opcional -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  </head>
  <div class="container">
      <header class="page-header">
     <h3>Wolfgang   <?php echo "$rol" ?>: <?php echo "$user" ?>  <?php echo "$apell" ?></h3>
        <ul class = "nav nav-pills pull-left">
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estudios
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo $altaEstudio; ?>">Alta</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Eliminar</a></li>
          </ul>
          </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuestionario
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $altaReactivo;?>">Alta</a></li>
                <li><a href="#">Modificar</a></li>
                <li><a href="#">Eliminar</a></li>
            </ul>
          </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Participantes
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="#">Seleción</a></li>
            <li><a href="#">Deseleción</a></li>
           </ul>
          </li>
        </ul>
        <ul class = "nav nav-pills pull-right">
          <li class ="active"><a href="<?php echo $inicio; ?>">Inicio</a></li>
          <li><a href="<?php echo $cerrarSesion; ?>">Cerrar Sesión</a></li>
        </ul>
      </header>
    </div>
     </header>
        <div class="jumbotron">
        <div class="form-group">
          <h3 class = "text-center"><?=  form_label('Alta Reactivo ','pregunta') ?></h3>
          <h3 class = "text-center"><?= form_textarea($pregunta) ?></h3>
          <h5 class = "text-center"><?= form_submit('','Enviar',"class='btn btn-primary'")?>
      <?= form_close() ?></h5>
      </div>
    </div>
      <div class="text-right">
        <p>&copy;Valverde Cruz Marisol</p>
      </div>
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/boo>tstrap-datepicker.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
     </script>
  </body>
</html>