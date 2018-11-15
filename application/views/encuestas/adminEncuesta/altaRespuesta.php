<?= form_open("adminEncuesta/recibirDatosRespuesta") ?>
<?php
$resnombre=array(
    'name' => 'respuesta','placeholder' => ' Escribe respuesta', 'maxlength'=>'20');
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
        <h5 class="text-center"><a class="close" data-dismiss='alert' arial-label="close">&times;</a><strong class="text-center"><?php echo $error; ?></strong></h5><h5 class="text-center"><?= validation_errors('‼ ');?></h5>
      </div>
    <?php } ?>
        <?php if(isset($correcto)){?>
      <div class="alert alert-success alert-dismissible"> 
        <h5 class="text-center"><a class="close" data-dismiss='alert' arial-label="close">&times;</a><strong class="text-center"><?php echo $correcto; ?></strong></h5><h5 class="text-center"><?= validation_errors('☻');?></h5>
      </div>
    <?php } ?>
    <!--<tr>-->
      <!--<div class="form-group">-->
          <h3 class = "text-center"><?=  form_label('Alta Respuesta ');#,'respuesta') ?></h3>  
          <div class = "text-center">
            <select name= "idReactivo" id="idReactivo">
              <option value="" selected>Selecciona la pregunta</option>
              <?php
                foreach ($idReactivo as $i){
                   echo '<option value="'. $i->idReactivo .'">'. $i->pregunta .'</option>';
                 } 
              ?>
            </select></div>
  <h4 class = "text-center">
  <?= form_input($resnombre) ?></h4>
  <h4 class = "text-center">
  <h5 class = "text-center"><?= form_submit('','Agregar respuesta',"class='btn btn-success'")?></h5>
  <?= form_close() ?>
   </div> 
   <div class="text-right">  
        <p>&copy; Maribel Garcia Bautista </p>
   </div>
<!--Insertamos jQuery dependencia de Bootstrap-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>