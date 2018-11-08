<?= form_open('/adminSistema/recibirDatosTipoUsuario')?>
<?php
$nombre=array('name' => 'nombre','placeholder' => ' Tipo De Usuario','maxlength'=>'20');
$altaUsuario=site_url('adminSistema/altaUsuarios',NULL);
$altaTipoUsuario=site_url('adminSistema/altaTipoUsuario',NULL);
$cerrarSesion=site_url('login/logout',NULL);
$inicio=site_url('adminSistema',NULL);
$rol = $this->session->userdata('rol');
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
?>
<html>
  <head>
    <title>Alta Tipo Usuario</title>
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
            <li><a href="<?php echo $altaTipoUsuario; ?>">Registrar</a></li>
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
        <?php if(isset($error)){?>
          <div class="alert alert-danger alert-dismissible">
            <h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong class = "text-center"><?php echo $error; ?></strong></h5>
            <h5 class = "text-center"> <?= validation_errors('*');?></h5>
          </div>
        <?php } ?>
        <?php if(isset($correcto)){?>
          <div class="alert alert-success alert-dismissible">
            <h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong class = "text-center"><?php echo $correcto; ?></strong></h5>
            <h5 class = "text-center"> <?= validation_errors('*');?></h5>
          </div>
        <?php } ?>
      		<h3 class = "text-center">Alta Tipo De Usuario</h3>
      		<h5 class = "text-center"><?=  form_label('Tipo De Usuario','nombre') ?>
      		<?= form_input($nombre) ?></h5>
      		<h5 class = "text-center"><?= form_submit('Registrar','Registrar',"class='btn btn-success'")?>
			<?= form_close() ?></h5>
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