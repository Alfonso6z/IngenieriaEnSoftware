<?= form_open('/adminSistema/recibirDatosUsuario')?>
<?php
	$nombre=array(
		'name' => 'nombre','placeholder' => ' Nombre de Usuario');
  $apellido=array(
    'name' => 'apellido','placeholder' => ' Apellido');
  $email=array(
    'name' => 'email','placeholder' => ' Em@il');
	$contrasena = array(
		'name' => 'contrasena','placeholder' => ' Contraseña');
$altaUsuario=site_url('adminSistema/altaUsuarios',NULL);
$cerrarSesion=site_url('login/logout',NULL);
$inicio=site_url('adminSistema',NULL);
$rol = $this->session->userdata('rol');
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
?>
<html>
  <head>
    <title>Registrarse</title>
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
            <li><a href="#">Registrar</a></li>
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
      		<h3 class = "text-center">Crea tu cuenta</h3>
      		<h5 class = "text-center"><?=  form_label('Usuario: ','nombre') ?>
      		<?= form_input($nombre) ?></h5>
          <h5 class = "text-center"><?=  form_label('Apellido: ','apellido') ?>
          <?= form_input($apellido) ?></h5>
          <h5 class = "text-center"><?=  form_label('Em@il: ','email') ?>
          <?= form_input($email) ?></h5>
      		<h5 class = "text-center"><?=  form_label('Contraseña: ','contrasena') ?>
      		<?= form_password($contrasena) ?></h5>
          <div class = "text-center">
            <select name= "tipoUsuario" id="tipoUsuario">
              <option value="select" selected>Selecciona tipo de usuario</option>
              <?php
                foreach ($roles as $i){
                   echo '<option value="'. $i->idRol .'">'. $i->idRol .'</option>';
                 } 
              ?>
            </select></div>
      		<h5 class = "text-center"><?= form_submit('Registrarse','Registrarse',"class='btn btn-success'")?>
			<?= form_close() ?></h5>
      </div>
      <div class="text-right">
        <p>&copy;Maribel Garcia Bautista</p>
      </div>
    </div>
    <!--Insertamos jQuery dependencia de Bootstrap-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>