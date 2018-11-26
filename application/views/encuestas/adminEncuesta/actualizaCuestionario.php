<?= form_open('/AdminEncuesta/modificarCuestionario')?>
<?php
$cuenombre=array('name' => 'cuenombre','placeholder' => 'Escriba cuestionario','maxlength'=>'20');
?>
<html>
<head>
  <title>Modifica Cuestionario</title>
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
        <div class="alert alert-success alert-dismissible">
          <h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong class = "text-center"><?php echo $correcto; ?></strong></h5>
          <h5 class = "text-center"> <?= validation_errors('*');?></h5>
        </div>
      <?php } ?>
        <h3 class = "text-center">Modificar Cuestionario</h3>
        <div class = "text-center">
            <select name= "IDcuestionario" id="IDcuestionario">
              <option value="" selected>Selecciona Cuestionario</option>
              <?php
                foreach ($IDcuestionario as $i){
                   echo '<option value="'. $i->IDcuestionario .'">'. $i->cuenombre .'</option>';
                 } 
              ?>
            </select></div>
             <h4 class = "text-center">
        <h4 class = "text-center"> 
        <?= form_input($cuenombre) ?></h4>
        <h4 class = "text-center">
        <h5 class = "text-center"><?= form_submit('Actualizar','Actualizar',"class='btn btn-warning'")?>
    <?= form_close() ?></h5>
    </div>
    <div class="text-left">
      <p>&copy;Eliseo Mirafuentes Martinez</p>
    </div>
  </div>
  <!--Insertamos jQuery dependencia de Bootstrap-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!--Insertamos el archivo JS compilado y comprimido -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>