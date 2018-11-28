<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$altaEstudio=site_url('adminEncuesta/altaEstudio',NULL);
$eliminarEstudio=site_url('adminEncuesta/eliminarEstudio',NULL);
$modificarEstudio=site_url('adminEncuesta/actualizarEstudio',NULL);
$altaCuestionario=site_url('adminEncuesta/altaCuestionario',NULL);
$altaReactivo=site_url('adminEncuesta/altaReactivo',NULL);
$modificaReactivo=site_url('adminEncuesta/actualizaReactivo',NULL);
$eliminarReactivo=site_url('adminEncuesta/eliminarReactivo',NULL);
$altaRespuesta=site_url('adminEncuesta/altaRespuesta',NULL);
$seleccionPart=site_url('adminEncuesta/seleccionPart',NULL);
$deseleccionPart=site_url('adminEncuesta/deseleccionPart',NULL);
$modificaCuestionario=site_url('adminEncuesta/actualizaCuestionario',NULL);
$eliminarCuestionario=site_url('adminEncuesta/eliminarCuestionario',NULL);
//$modificaEstudio=site_url('adminEncuesta/vista_estudios',NULL);
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
<body>
<div class="container">
    <header class="page-header">
   <h3>Wolfgang   <?php echo "$rol" ?>: <?php echo "$user" ?>  <?php echo "$apell" ?></h3>
      <ul class = "nav nav-pills pull-left">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estudios
        <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo $altaEstudio; ?>">Alta</a></li>
          <li><a href="<?php echo $modificarEstudio;?>">Modificar</a></li>
          <li><a href="<?php echo $eliminarEstudio;?>">Eliminar</a></li>
        </ul>
        </li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuestionario
        <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo $altaCuestionario;?>">Alta</a></li>
              <li><a href="<?php echo $modificaCuestionario;?>">Modificar</a></li>
              <li><a href="<?php echo $eliminarCuestionario;?>">Eliminar</a></li>
          </ul>
        </li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reactivos
        <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo $altaReactivo;?>">Alta</a></li>
              <li><a href="<?php echo $modificaReactivo;?>">Modificar</a></li>
              <li><a href="<?php echo $eliminarReactivo;?>">Eliminar</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Respuesta
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo $altaRespuesta; ?>">Alta</a></li>
            <li><a href="#">Modificar</a></li>
            <li><a href="#">Eliminar</a></li>
          </ul>
          </li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Participantes
        <span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="<?php echo $seleccionPart;?>">Seleccion</a></li>
          <li><a href="<?php echo $deseleccionPart;?>">Deseleccion</a></li>
         </ul>
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