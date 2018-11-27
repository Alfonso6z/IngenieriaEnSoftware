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
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
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
              <option value="0" >Selecciona la pregunta</option>
              <?php
                foreach ($reactivo as $i){
                  if ($i->idTipoReactivo == 2){ 
                   echo '<option value="'. $i->idReactivo .'">'. $i->pregunta .'</option>';
                  }
                 } 
              ?>
            </select></div>
          <div class="text-center">
            <select id="idRespuesta" name="idRespuesta">
                <option value="0">Respuestas</option>
            </select>
          </div>
  <h4 class = "text-center">
  <?= form_input($resnombre) ?></h4>
  <h4 class = "text-center">
  <h5 class = "text-center"><?= form_submit('','Agregar respuesta',"class='btn btn-success'")?></h5>
  <?= form_close() ?>
   </div> 
   <div class="text-right">  
        <p>&copy; Maribel Garcia Bautista </p>
   </div>
    <script type="text/javascript">
    /*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
    $(document).ready(function(){
       $("#idReactivo").change(function () {
               $("#idReactivo option:selected").each(function () {
                idReactivo=$('#idReactivo').val();
                $.post("<?php echo base_url('adminEncuesta/respuestas'); ?>", { idReactivo: idReactivo}, function(data){
                $("#idRespuesta").html(data);
                });            
            });
       })
    });
    /*fin de la funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
    </script>
<!--Insertamos jQuery dependencia de Bootstrap-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>