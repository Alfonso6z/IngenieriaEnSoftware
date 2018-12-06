
<?= form_open('/login/validaLogin')?>
<?php
	$email=array(
		'name' => 'email','placeholder' => ' email de Usuario','maxlength'=>'25');
	$contrasena = array(
		'name' => 'contrasena','placeholder' => ' Contraseña','maxlength'=>'25');
  $var=site_url('login',NULL);
  
  $recpass=site_url('login/recContrasenia',NULL);
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
     <h4><img class="img-responsive" align="left"  vspace="0" hspace="20" width="212"  hight="110" src="/IngenieriaEnSoftware/wolfG.png" alt="Wolfy"></h4><br><br><br>
      <div style="width: 93%">
        <ul class = "nav nav-pills pull-right">
         <li ><a href="<?php echo $var; ?>">Inicio</a></li>
         <li class ="active"><a href="">Iniciar Sesión</a></li>
        </ul>
      </div>  
         <header class="page-header"><div> 
        <h4>

        </h4> 

      </div></header>
    <header class="page-header">
    <div class="container">  
      <div class="jumbotron">
         <?php if(isset($error)){?>
          <div class="alert alert-danger alert-dismissible">
            <h6 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong class = "text-center"><?php echo $error; ?></strong></h6>
            <h5 class = "text-center"> <?= validation_errors('*');?></h5>
          </div>
        <?php } ?>
      		<h3 class = "text-center"><strong> Inicio de Sesión </strong></h3><br>
      		<h4 class = "text-center"><?=  form_label('Email: ','email') ?>
      		  <?= form_input($email) ?>  
          </h4><h3> </h3>
      		<h4 style="width: 95%" class = "text-center"><?=  form_label('Contraseña: ','contrasena') ?>
      		  <?= form_password($contrasena) ?>  
          </h4><h3> </h3>
          <h5 class = "text-center"><a href=" <?php echo $recpass; ?>">Recuperar Contraseña</a>
      		<h5 class = "text-center"><?= form_submit('','Iniciar',"class='btn btn-primary'")?>
			     <?= form_close() ?>     
          </h5>
      </div>
      </header>
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