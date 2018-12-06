<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$estudiosAsig=site_url('encuestador/estudiosAsignadosE',NULL);
$estudiosPar=site_url('encuestador/estudiosParticular',NULL);
//$modifircaEstudio=site_url('adminEncuesta/vista_estudios',NULL);
$respondeReactivo=site_url('encuestador/responderReactivo',NULL);
$cerrarSesion=site_url('login/logout',NULL);
$inicio=site_url('Encuestador',NULL);
$rol = $this->session->userdata('rol');
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
?><!DOCTYPE html>
<html>
<head>
  <title>Encuestas de Encuestador</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Insertamos el archivo CSS compilado y comprimido -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <!-- Theme opcional -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">
    <header class="page-header">
    <div class="row">
        <div class="col-lg-2"><img class="img-responsive" align="middle"  vspace="0" hspace="10" align="bottom" src="/IngenieriaEnSoftware/wolfG.png" alt="Wolfy"></div><br><br>
        <div class="col-lg-6 "><h4 class="text-left"><?php echo "$rol" ?>: <?php echo "$user" ?>  <?php echo "$apell" ?></h4>
        </div>
        <div class="col-lg-4">
          <ul class = "nav nav-pills pull-right">
           <li class ="active"><a href="<?php echo $inicio; ?>">Inicio</a></li>
           <li><a href="<?php echo $cerrarSesion; ?>">Cerrar Sesión</a></li>
          </ul> 
       </div>  
     </div>    
      <ul class = "nav nav-pills pull-left">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estudios
        <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo $estudiosAsig; ?>">Estudios Asignados</a></li>
          <li><a href="<?php echo $estudiosPar; ?>">Estudios en particular</a></li>
          <li><a href="<?php echo $respondeReactivo; ?>">Responder reactivo</a></li>
        </ul>
        </li>
      </ul>
    </header>
  </div>
</body>
</html>