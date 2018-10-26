<?= form_open('/encuestas/recibirDatosRegistro')?>
<?php
	$nombre=array(
		'name' => 'nombre','placeholder' => ' Nombre de Usuario');
  $apellido=array(
    'name' => 'apellido','placeholder' => ' Apellido');
  $email=array(
    'name' => 'email','placeholder' => ' Em@il');
	$contrasena = array(
		'name' => 'contrasena','placeholder' => ' Contraseña');
	$var=site_url('encuestas/inicio',NULL);
  $var2=site_url('encuestas/iniciaSesion',NULL);
?>
<html>
  <head>
    <title>Registrarse</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <!-- Theme opcional -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  </head>
  <body>
    <div class="container">
      <header class="page-header">
        <ul class = "nav nav-pills pull-right">
          <li><a href=" <?php echo $var; ?>">Inicio</a></li>
          <li ><a href=" <?php echo $var2; ?>">Iniciar Sesión</a></li>
          <li class="active"><a href="">Registrarse</a></li>
        </ul>
        <h3>Wolfgang</h3>
      </header>
      <div class="jumbotron">
      		<h3 class = "text-center">Crea tu cuenta</h3>
      		<h5 class = "text-center"><?=  form_label('Usuario: ','nombre') ?>
      		<?= form_input($nombre) ?></h5>
          <h5 class = "text-center"><?=  form_label('Apellido: ','apellido') ?>
          <?= form_input($apellido) ?></h5>
          <h5 class = "text-center"><?=  form_label('Em@il: ','email') ?>
          <?= form_input($email) ?></h5>
      		<h5 class = "text-center"><?=  form_label('Contraseña: ','contrasena') ?>
      		<?= form_password($contrasena) ?></h5>
      		<h5 class = "text-center"><?= form_submit('','Registrarse',"class='btn btn-warning'")?>
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