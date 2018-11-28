<?= form_open('/adminSistema/modificarUsuario')?>
<?php
  $nombre=array('name' => 'nombre','placeholder' => 'Nombre','maxlength'=>'20');
  $apellido=array(
    'name' => 'apellido','placeholder' => ' Apellido','maxlength'=>'20');
  $email=array(
    'name' => 'email','placeholder' => ' Em@il','maxlength'=>'25');
?>
<html>
<head>
  <title>Modifica Usuario</title>
  <!-- Insertamos el archivo CSS compilado y comprimido -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <!-- Theme opcional -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
</head>
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
        <h3 class = "text-center"><?=  form_label(' Modificar Usuario ');#,'respuesta') ?></h3> 
          <br> 
          <div  class = "text-center">
            <select name= "idLogin" id="idLogin">
              <option value="0" >Selecciona Usuario</option>
              <?php
                foreach ($idLogin as $i){
                   echo '<option value="'. $i->idLogin .'">'. $i->user.'  '.$i->apellido.'</option>';
                 } 
              ?>
            </select>
            <br>
            <h5 class = "text-center"><?=  form_label('Usuario: ','nombre') ?>
            <?= form_input($nombre) ?></h5>
            <h5 class = "text-center"><?=  form_label('Apellido: ','apellido') ?>
            <?= form_input($apellido) ?></h5>
            <h5 class = "text-center"><?=  form_label('Em@il: ','email') ?>
            <?= form_input($email) ?></h5>
            <div class = "text-center">
              <select name= "tipoUsuario" id="tipoUsuario">
                <option value="select" selected>Selecciona tipo de usuario</option>
                <?php foreach ($roles as $i){
                   echo '<option value="'. $i->idRol .'">'. $i->idRol .'</option>';
                  } 
                ?>
              </select></div>
        <h5><?= form_submit('Actualizar','Actualizar',"class='btn btn-warning'")?>
    <?= form_close() ?></h5>   
  </div>
</div>
  <div class="text-left">
      <p>&copy; Valverde Cruz Marisol</p>
    </div>
</div>
  <script type="text/javascript">
  <!--Insertamos jQuery dependencia de Bootstrap-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!--Insertamos el archivo JS compilado y comprimido -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>