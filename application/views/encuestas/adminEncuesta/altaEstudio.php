<?= form_open("adminEncuesta/recibirDatosEstudio") ?>
<?php
$nombre = array('name' => 'nombre','placeholder' => 'Nombre del estudio','maxlength'=>'50');
$descripcion = array('name' => 'descripcion','placeholder' => 'Escriba una breve descripción', 'maxlength'=>'200');
?>
<html>
  <head><!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  </head>
  <body>
    <div class="jumbotron">
      <?php if(isset($error)){?>
      <div class="alert alert-danger alert-dismissible">
        <h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong
          class = "text-center"><?php echo $error; ?></strong>
        </h5>
        <h5 class = "text-center"> 
          <?=validation_errors('*');?>
        </h5>
      </div>
      <?php } ?>
      <?php if(isset($correcto)){?>
      <div class="alert alert-success alert-dismissible">
        <h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong class = "text-center"><?php echo $correcto; ?></strong>
        </h5>
        <h5 class = "text-center"> 
          <?= validation_errors('*');?> 
        </h5>
      </div>
      <?php } ?>
      <h3 class = "text-center">
        <strong>Agregar estudio</strong>
      </h3><h3></h3>
      <div class="text-center">
        <h4>
          <?= form_label('Nombre: ', 'nombre') ?>
          <br><?= form_input($nombre)  ?>
        </h4>
        <h4><br>
          <?= form_label('Descripción del estudio: ', 'descripcion')?>
          <br>
        </h4>
        <h4>
          <?= form_textarea($descripcion) ?>    
        </h4>
      </div>  
      <h5 class = "text-center">
        <?= form_submit('','Agregar',"class='btn btn-success'")?>
      </h5>
      <?= form_close() ?>
    </div>
    <p>&copy; Eliseo Mirafuentes Martínez </p>
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>