<?= form_open("adminEncuesta/recibirDatosReactivo") ?>
<?php
$pregunta=array(
  'name' => 'pregunta','placeholder' => ' Escribe una pregunta', 'maxlength'=>'100');
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
  <tr>
    <div class="form-group">
        <h3 class = "text-center"><?=  form_label('Alta Reactivo ','pregunta') ?></h3>  
        <div class = "text-center">
          <select name= "IDcuestionario" id="IDcuestionario">
            <option value="" selected>Selecciona el cuestionario</option>
            <?php
              foreach ($IDcuestionario as $i){
                 echo '<option value="'. $i->IDcuestionario .'">'. $i->cuenombre .'</option>';
               } 
            ?>
          </select></div>
              <br><div class = "text-center">
        <select name= "TipoReactivo" id="TipoReactivo">
          <option value="select" selected>Selecciona tipo de reactivo</option>
          <?php
            foreach ($TipoReactivo as $i){
               echo '<option value="'. $i->idTipoReactivo .'">'. $i->nombre .'</option>';
          } 
          ?>
       </select></div>
        <h3 class = "text-center" required><?= form_textarea($pregunta) ?></h3>
      </div>
      <h5 class = "text-center"><?= form_submit('','Aceptar',"class='btn btn-success'")  ?> 
      <?= form_close() ?>
      </h5>
  </tr>
</div>   
<p>&copy; Valverde Cruz Marisol </p>
<!--Insertamos jQuery dependencia de Bootstrap-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!--Insertamos el archivo JS compilado y comprimido -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>