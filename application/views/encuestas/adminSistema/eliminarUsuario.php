<?= form_open('/adminSistema/eliminarUsuario')?>
<?php

?>
<html>
<head>
  <title>Eliminar Usuario</title>
 <!-- Insertamos el archivo CSS compilado y comprimido -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <!-- Theme opcional -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
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
        <div class="alert alert-warning alert-dismissible">
          <h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong class = "text-center"><?php echo $correcto; ?></strong></h5>
          <h5 class = "text-center"> <?= validation_errors('*');?></h5>
        </div>
      <?php } ?>
        <h3 class = "text-center">Eliminar Usuario</h3>
        <div class = "text-center">
            <select name= "idLogin" id="idLogin">
              <option value="" selected>Selecciona un usuario</option>
              <?php
                foreach ($idLogin as $i){
                   echo '<option value="'. $i->idLogin .'">'. $i->user.'  '.$i->apellido.'</option>';
                 } 
              ?>
            </select></div>
            <br>
        <h5 class = "text-center"><?= form_submit('Borrar','Borrar',"class='btn btn-danger'")?>
    <?= form_close() ?></h5>
    </div>
    <div class="text-left">
      <p>&copy; Mirafuentes Eliseo</p>
    </div>
</div>
  <script type="text/javascript">
  <!--Insertamos jQuery dependencia de Bootstrap-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!--Insertamos el archivo JS compilado y comprimido -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
