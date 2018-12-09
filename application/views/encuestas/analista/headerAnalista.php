<?= form_open('/Analista/dExcel')?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$estudiosParAna=site_url('analista/estudiosParticularAnalista',NULL);
$cerrarSesion=site_url('login/logout',NULL);

$inicio=site_url('Analista',NULL);

$rol = $this->session->userdata('rol'); 
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
?><!DOCTYPE html>
<html>
  <head>
    <title>Analista</title> 
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Insertamos el archivo CSS compilado y comprimido -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <!-- Theme opcional -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  </head>
  <body>
  <div class="container">
      <header class="page-header">
      <h3><img class="img-responsive" src="/IngenieriaEnSoftware/wolf.png" alt="Wolf"></h3> 
       <h4><?php echo "$rol" ?>: <?php echo "$user" ?>  <?php echo "$apell" ?></h4>
        <ul class = "nav nav-pills pull-left">
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estudios
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo $estudiosParAna; ?>">Estudios en particular</a></li>
          </ul>
          </li> 
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Analisis Reactivo
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href= "#" >Respuesta Abierta</a></li>
            <li><a href="#">Opción Multiple</a></li>
          </ul>
          </li>

           <li class="dropdown">
           <li><?= form_submit('','Generar Excel',"class='btn btn-success'")?><?= form_close() ?></li>

            </li>
             </ul>
            <ul class = "nav nav-pills pull-right">
           
        <li class ="active"><a href="<?php echo $inicio; ?>">Inicio</a></li>
        <li><a href="<?php echo $cerrarSesion; ?>">Cerrar Sesión</a></li>
      </ul>
      </header>
    </div>
  </body>
</html>