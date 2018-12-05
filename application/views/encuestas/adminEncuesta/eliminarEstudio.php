<?= form_open('/AdminEncuesta/borrarEstudio')?>
<?php
$nombre=array('name' => 'nombre');
?>
<html>
<head>
  <title>Elimina estudio</title>
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
        <h3 class = "text-center"><strong> Eliminar Estudio </strong></h3><h2> </h2>
        <div class = "text-center">
          <h4>
            <select name= "idEstudio" id="idEstudio">
              <option value="" selected>Selecciona el estudio</option>
              <?php
                foreach ($idEstudio as $i){
                   echo '<option value="'. $i->idEstudio.'">'. $i->nombre .'</option>';
                 } 
              ?>
            </select>
          </h4>  
        </div><h3> </h3>
        <h5 class = "text-center"><?= form_submit('Borrar','Eliminar',"class='btn btn-danger'")?>
          <?= form_close() ?>    
        </h5>
    </div>
    <div class="text-left">
      <p>&copy;Unedgaro</p>
    </div>
  </div>
    <!--Insertamos jQuery dependencia de Bootstrap--> 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>