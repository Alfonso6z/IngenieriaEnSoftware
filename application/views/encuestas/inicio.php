<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$var=site_url('login/iniciaSesion',NULL);
?><!DOCTYPE html>
<html>

  <head>
    <title>Inicio</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <!-- Theme opcional -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  </head>
  <body>
    <div class="container">
      <header class="page-header">
        <ul class = "nav nav-pills pull-right">
          <li class ="active"><a href="">Inicio</a></li>
          <li><a href=" <?php echo $var; ?>">Iniciar Sesión</a></li>
        </ul>
        <h3>Wolfgang</h3>
      </header>
      <div class="jumbotron">
        <h1>Ingenieria en Software</h1>
        <p>Sistema de encuesta<p>
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