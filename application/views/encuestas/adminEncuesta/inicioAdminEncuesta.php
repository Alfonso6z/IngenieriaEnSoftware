<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$altaEstudio=site_url('adminEncuesta/altaEstudio',NULL);
$altaReactivo=site_url('adminEncuesta/altaReactivo',NULL);
$modificaEstudio=site_url('adminEncuesta/vista_estudios',NULL);
$cerrarSesion=site_url('login/logout',NULL);
$inicio=site_url('adminEncuesta',NULL);
$rol = $this->session->userdata('rol');
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
?><!DOCTYPE html>
<html>
  <head>
    <title>Administrador de Encuestas</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Insertamos el archivo CSS compilado y comprimido -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!-- Theme opcional -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
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
            <li><a href="<?php echo $modificaEstudio; ?>">Modificar</a></li>
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
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>Ingenieria en Software</h1>
        <p>Vista Administrador de Encuestas<p>
      </div>
      <div class="text-right">
        <p>&copy;Alfonso González Zempoalteca</p>
      </div>
    </div>
    <!--Insertamos jQuery dependencia de Bootstrap-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>