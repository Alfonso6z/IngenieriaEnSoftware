<?= form_open('/login/validaLogin')?>
<?php
	$nombre=array(
		'name' => 'nombre','placeholder' => ' Nombre de Usuario');
	$contrasena = array(
		'name' => 'contrasena','placeholder' => ' Contraseña');
	$var=site_url('login');
?>
<html>
  <head>
    <title>Inicia Sesion</title>
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
          <li class = "active"><a href="">Iniciar Sesión</a></li>
        </ul>
        <h3>Wolfgang</h3>
      </header>
      <div class="jumbotron">
      		<h3 class = "text-center">Inicio de Sesión</h3>
      		<h5 class = "text-center"><?=  form_label('Usuario: ','nombre') ?>
      		<?= form_input($nombre) ?></h5>
      		<h5 class = "text-center"><?=  form_label('Contraseña: ','contrasena') ?>
      		<?= form_password($contrasena) ?></h5>
      		<h5 class = "text-center"><?= form_submit('','Iniciar',"class='btn btn-success'")?>
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