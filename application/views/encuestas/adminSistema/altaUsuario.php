<?= form_open('/adminSistema/recibirDatosUsuario')?>
<?php
	$nombre=array(
		'name' => 'nombre','placeholder' => ' Nombre de Usuario','maxlength'=>'20');
  $apellido=array(
    'name' => 'apellido','placeholder' => ' Apellido','maxlength'=>'20');
  $email=array(
    'name' => 'email','placeholder' => ' Em@il','maxlength'=>'25');
	$contrasena = array(
		'name' => 'contrasena','placeholder' => ' Contraseña','maxlength'=>'25');
?>
<html>
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