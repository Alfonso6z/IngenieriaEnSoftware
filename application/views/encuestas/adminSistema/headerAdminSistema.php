<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$altaUsuario=site_url('adminSistema/altaUsuarios',NULL);
$actualizaUsuario=site_url('adminSistema/actualizaUsuario',NULL);
$altaTipoUsuario=site_url('adminSistema/altaTipoUsuario',NULL);
$actualizaTipoUsuario=site_url('adminSistema/actualizaTipoUsuario',NULL);
$bajaTipoDeUsuario=site_url('adminSistema/bajaTipoDeUsuario',NULL);
$altaTipoReactivo=site_url('adminSistema/altaTipoReactivo',NULL);
$actualizaTipoReactivo=site_url('adminSistema/actualizaTipoReactivo',NULL);
$bajaTipoDeReactivo=site_url('adminSistema/bajaTipoDeReactivo',NULL);
$eliminarUsuario=site_url('adminSistema/eliminarUsuario',NULL);
$cerrarSesion=site_url('login/logout',NULL);
$inicio=site_url('adminSistema',NULL);
$rol = $this->session->userdata('rol'); 
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href= "<?php echo $altaUsuario; ?>" >Registrar</a></li>
            <li><a href="<?php echo $actualizaUsuario; ?>">Modificar</a></li>
            <li><a href="<?php echo $eliminarUsuario; ?>">Eliminar</a></li>
            <li><a href="#">Cambio De Password</a></li>
          </ul>
          </li>        
           <li class="dropdown">
           <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tipo De Usuario
           <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href= "<?php echo $altaTipoUsuario; ?>" >Registrar</a></li>
            <li><a href="<?php echo $actualizaTipoUsuario; ?>">Modificar</a></li>
            <li><a href="<?php echo $bajaTipoDeUsuario; ?>">Eliminar</a></li>
           </ul>
          </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tipo De Reactivo
          <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo $altaTipoReactivo; ?>">Alta</a></li>
            <li><a href="<?php echo $actualizaTipoReactivo; ?>">Modificar</a></li>
            <li><a href="<?php echo $bajaTipoDeReactivo; ?>">Eliminar</a></li>
           </ul>
          </li>
        </ul>
      </header>
    </div>
</html>