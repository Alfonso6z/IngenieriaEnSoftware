<?= form_open('/AdminEncuesta/modificarCuestionario')?>
<?php
$cuenombre=array('name' => 'cuenombre','placeholder' => 'Escriba cuestionario','maxlength'=>'20');
?>
<html>
<head>
  <title>Modifica Cuestionario</title>
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
        <h3 class = "text-center"><Strong> Modificar Cuestionario </Strong>
        </h3><p></p>
        <div class = "text-center">
            <h4>    
              <select name= "idEstudio" id="idEstudio">
              <option value="0" >Selecciona Estudio</option>
              <?php
                foreach ($estudio as $i){
                   echo '<option value="'. $i->idEstudio .'">'. $i->nombre .'</option>';
                 } 
              ?>
            </select> &nbsp; &nbsp;
            <select id="idCuestionario" name="idCuestionario">
                <option value="0">Cuestionarios</option>
            </select>
            </h4>
        </div>  <h1> </h1>
        <h4 class = "text-center"><?= form_label('Nuevo nombre:') ?>
        <h4 class = "text-center"> 
          <?= form_input($cuenombre) ?>   
        </h4><br>
        <h5 class = "text-center"><?= form_submit('Actualizar','Modificar',"class='btn btn-warning'")?>
          <?= form_close() ?>
        </h5>
    </div>
    <div class="text-left">
      <p>&copy;Eliseo Mirafuentes Martinez</p>
    </div>
    <script type="text/javascript">
    /*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
    $(document).ready(function(){
       $("#idEstudio").change(function () {
               $("#idEstudio option:selected").each(function () {
                idEstudio=$('#idEstudio').val();
                $.post("<?php echo base_url('ControlComboBoxes/estudioCuestionario'); ?>", { idEstudio: idEstudio}, function(data){
                $("#idCuestionario").html(data);
                });            
            });
       })
    });
    /*fin de la funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
    </script>
  </div>
  <!--Insertamos jQuery dependencia de Bootstrap-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!--Insertamos el archivo JS compilado y comprimido -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>