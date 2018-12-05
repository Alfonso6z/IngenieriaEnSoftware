<?= form_open("adminEncuesta/recibirDatosReactivo") ?>
<?php
$pregunta=array(
  'name' => 'pregunta','placeholder' => ' Escribe una pregunta', 'maxlength'=>'100');
?>
<html>
  <head><!-- Insertamos el archivo CSS compilado y comprimido -->
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
          <h5 class="text-center"><a class="close" data-dismiss='alert' arial-label="close">&times;</a><strong class="text-center"><?php echo $error; ?></strong></h5><h5 class="text-center"><?= validation_errors('‼ ');?>            
          </h5>
        </div>
      <?php } ?>
      <?php if(isset($correcto)){?>
        <div class="alert alert-success alert-dismissible"> 
          <h5 class="text-center"><a class="close" data-dismiss='alert' arial-label="close">&times;</a><strong class="text-center"><?php echo $correcto; ?></strong></h5><h5 class="text-center"><?= validation_errors('*');?>
          </h5>
        </div>
      <?php } ?>
      <div class="form-group">
        <h3 class = "text-center">
          <strong>Agregar reactivo</strong>            
        </h3><br>  
        <div class = "text-center">
          <h4>    
            <select name= "idEstudio" id="idEstudio">
              <option value="" selected>Selecciona un estudio</option>
              <?php
                foreach ($estudio as $i){
                   echo '<option value="'. $i->idEstudio .'">'. $i->nombre .'</option>';
                 } 
              ?>
            </select> &nbsp; 
            <select id="idCuestionario" name="idCuestionario">
                <option value="0" selected>Selecciona un cuestionario</option>
            </select>
          </h4>  
        </div><br>
        <h4 class="text-center" > <?= form_textarea($pregunta) ?></h4>
          <div class="text-center">  
            <table class="table table-hover" align="center" style="max-width: 50%">     
              <thead>
                <tr>
                    <th class="text-center">Selección</th>
                    <th class="text-center">Tipo de respuesta</th>
                </tr>
              </thead>
                <tbody>
                 <?php
                    foreach ($TipoReactivo as $i){ 
                    echo "<tr><td><label><input type='radio' id='TipoReactivo' name='TipoReactivo' value = ".$i->idTipoReactivo."></td><td>".$i->nombre."</td></label></td></tr>";
                  }?>
                </tbody>              
            </table>
          </div>
      </div><h1></h1>
      <h5 class = "text-center">
        <?= form_submit('','Aceptar',"class='btn btn-success'")?> 
      </h5>
      <?= form_close() ?>
  </tr>
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
<!--Insertamos jQuery dependencia de Bootstrap-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!--Insertamos el archivo JS compilado y comprimido -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>