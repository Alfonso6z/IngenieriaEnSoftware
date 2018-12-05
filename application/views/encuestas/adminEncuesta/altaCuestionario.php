<?= form_open("adminEncuesta/recibirDatosCuestionario") ?>
<?php
  $cuenombre = array('name' => 'nombre','placeholder' => 'Escribe un nombre', 'maxlength'=>'20');
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
          <h5 class="text-center"><a class="close" data-dismiss='alert' arial-label="close">&times;</a>
            <strong class="text-center"><?php echo $error; ?></strong></h5><h5 class="text-center"><?=validation_errors('‼ ');?>
          </h5>
        </div>
      <?php } ?>
      <?php if(isset($correcto)){?>
        <div class="alert alert-success alert-dismissible"> 
          <h5 class="text-center"><a class="close" data-dismiss='alert' arial-label="close">&times;</a><strong class="text-center"><?php echo $correcto; ?></strong></h5><h5 class="text-center"><?= validation_errors('*');?></h5>
        </div>
      <?php } ?>
      <h3 class = "text-center"><strong> 
        Agregar cuestionario</strong>
      </h3><br>
      <div class = "text-center">
        <h4>
          <select name= "idEstudio" id="idEstudio">
            <option  value="" selected >Selecciona un estudio</option>
            <?php
              foreach ($idEstudio as $i){
                 echo '<option value="'. $i->idEstudio .'">'. $i->nombre .'</option>';
               } 
            ?>
          </select>
        </h4>  
      </div><h1>  </h1>
      <h4 class = "text-center"> <?= form_label('Nombre del cuestionario: ')?>
      </h4>
      <h4 class="text-center">
        <?= form_input($cuenombre) ?>    
      </h4><h1> </h1>
        <h5 class = "text-center"><?= form_submit('','Aceptar',"class='btn btn-success'")?>
      <?= form_close() ?></h5>
    </div>   
    <p>&copy; Valverde Cruz Marisol </p>
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>