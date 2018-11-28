<?= form_open("adminEncuesta/borrarRespuesta") ?>
<?php
$respuesta=array('name' => 'respuesta');
?>
<html>
  <head><!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
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
          <h3 class = "text-center"><?=  form_label(' Eliminar Respuesta '); ?></h3> 
          <br> 
          <div class="text-center">
            <select style="margin-left: 20px;" name= "idEstudio" id="idEstudio">
              <option value="0" >Selecciona Estudio</option>
              <?php
                foreach ($estudio as $i){
                  //if ($i->idTipoReactivo == 2){ 
                   echo '<option value="'. $i->idEstudio .'">'. $i->nombre .'</option>';
                  //}
                 } 
              ?>
            </select>
            <select style="margin-left: 20px;" id="idCuestionario" name="idCuestionario">
                <option value="0">Cuestionarios</option>
            </select> 
            <select style="margin-left: 20px;" id="idReactivo" name="idReactivo">
                <option value="0">Reactivos</option>
            </select>
          </div>
          <br>
          <div class="text text-center">
 			<select id="idRespuesta" name="idRespuesta">
                <option value="0">Respuestas</option>
            </select>
            </div>	
          <br>
  	<br>
  <h4 class = "text-center">
  <h5 class = "text-center"><?= form_submit('','Borrar',"class='btn btn-danger'")?></h5></h4>
  <?= form_close() ?>
   </div> 
   <div class="text-left">  
        <p>&copy; Valverde Cruz Marisol </p>
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
    <script type="text/javascript">
    $(document).ready(function(){
       $("#idCuestionario").change(function () {
               $("#idCuestionario option:selected").each(function () {
                idCuestionario=$('#idCuestionario').val();
                $.post("<?php echo base_url('ControlComboBoxes/cuestionarioReactivo'); ?>", { idCuestionario: idCuestionario}, function(data){
                $("#idReactivo").html(data);
                });            
            });
       })
    });
    </script>
     <script type="text/javascript">
    $(document).ready(function(){
       $("#idReactivo").change(function () {
               $("#idReactivo option:selected").each(function () {
                idReactivo=$('#idReactivo').val();
                $.post("<?php echo base_url('ControlComboBoxes/modificaReactivoRespuesta'); ?>", { idReactivo: idReactivo}, function(data){
                $("#idRespuesta").html(data);
                });            
            });
       })
    });
    </script>
<!--Insertamos jQuery dependencia de Bootstrap-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>