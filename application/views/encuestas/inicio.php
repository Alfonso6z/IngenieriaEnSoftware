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
    <h4><img class="img-responsive" align="left"  vspace="0" hspace="20" width="212"  hight="110" src="/IngenieriaEnSoftware/wolfG.png" alt="Wolfy"></h4><br><br><br>
      <div style="width: 93%">
        <ul class = "nav nav-pills pull-right">
         <li class ="active"><a href="">Inicio</a></li>
         <li><a href="<?php echo $var; ?>">Iniciar Sesión</a></li>
        </ul>
      </div>  
         <header class="page-header"><div> 
        <h4>

        </h4> 

      </div></header>
    <header class="page-header">
    <div class="container">  
      <div class="jumbotron">
        <h1>Ingeniería en Software</h1><br>
        <p>Sistema de encuestas<p>
      </div></header>
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