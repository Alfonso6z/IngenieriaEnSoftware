<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$altaUsuario=site_url('adminSistema/altaUsuarios',NULL);
$cerrarSesion=site_url('login/logout',NULL);
$inicio=site_url('adminSistema',NULL);
$rol = $this->session->userdata('rol');
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
?><!DOCTYPE html>
<html>
  <head>
    <title>Administrador de Sistema</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo $altaUsuario; ?>">Registrar</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Eliminar</a></li>
            <li><a href="#">Cambio De Password</a></li>
          </ul>
          </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tipo De Usuario
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="">Registrar</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Eliminar</a></li>
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
        <p>Vista Administrador de Sistema<p>
      </div>
      <div class="text-right">
        <p>&copy;Alfonso González Zempoalteca</p>
      </div>
    </div>
    <!--Insertamos jQuery dependencia de Bootstrap-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>