
<?= form_open('/login/validaLogin')?>
<?php
	$email=array(
		'name' => 'email','placeholder' => ' email de Usuario','maxlength'=>'25');
	$contrasena = array(
		'name' => 'contrasena','placeholder' => ' Contraseña','maxlength'=>'25');
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
        <h3><strong>Wolfgang</strong></h3>
      </header>
      <div class="jumbotron">
         <?php if(isset($error)){?>
          <div class="alert alert-danger alert-dismissible">
            <h6 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong class = "text-center"><?php echo $error; ?></strong></h6>
            <h5 class = "text-center"> <?= validation_errors('*');?></h5>
          </div>
        <?php } ?>
      		<h3 class = "text-center"><strong> Inicio de Sesión </strong></h3><br>
      		<h4 class = "text-center"><?=  form_label('Email ','email') ?>
      		  <?= form_input($email) ?>  
          </h4><h3> </h3>
      		<h4 style="width: 94%" class = "text-center"><?=  form_label('Contraseña: ','contrasena') ?>
      		  <?= form_password($contrasena) ?>  
          </h4><h3> </h3>
      		<h5 class = "text-center"><?= form_submit('','Iniciar',"class='btn btn-primary'")?>
			     <?= form_close() ?>     
          </h5>
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