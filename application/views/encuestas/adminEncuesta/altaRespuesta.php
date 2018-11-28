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
    <!--<tr>-->
      <!--<div class="form-group">-->
          <h3 class = "text-center"><?=  form_label('Alta Respuesta ');#,'respuesta') ?></h3>  
          <div class = "text-center">
            <select name= "idEstudio" id="idEstudio">
              <option value="0" >Selecciona Estudio</option>
              <?php
                foreach ($estudio as $i){
                  //if ($i->idTipoReactivo == 2){ 
                   echo '<option value="'. $i->idEstudio .'">'. $i->nombre .'</option>';
                  //}
                 } 
              ?>
            </select>
          </div>
          <div class="text-center">
            <select id="idCuestionario" name="idCuestionario">
                <option value="0">Cuestionarios</option>
            </select>
          </div>
          <div class="text-center">
            <select id="idReactivo" name="idReactivo">
                <option value="0">Reactivos</option>
            </select>
          </div>
          <div class="text-center">
            <div class="container">
              <h4> Respuestas Ya Registradas </h4>
              <tr></tr><table class="table table-hover" id = "idRespuesta">
                <td>
                  
                </td>
              </table>
            </div>  
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
                $.post("<?php echo base_url('ControlComboBoxes/reactivoRespuesta'); ?>", { idReactivo: idReactivo}, function(data){
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