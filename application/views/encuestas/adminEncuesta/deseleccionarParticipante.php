<?= form_open("adminEncuesta/recibirDatosdeseleccionPart") ?>
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
      <h3 class = "text-center"> <?= form_label('Eliminacion de participantes'); ?></h3>
      <div class = "text-center">
      <select name= "idEstudio" id="idEstudio">
      
              <option value="0" >Selecciona Estudio</option>
              <?php
                foreach ($idEstudio as $i){
                  //if ($i->idTipoReactivo == 2){ 
                   echo '<option value="'. $i->idEstudio .'">'. $i->nombre .'</option>';
                  //}
                 } 
              ?>
        </select>
        <select style="margin-left: 25px;" id="idCuestionario" name="idCuestionario">
                <option value="0">Cuestionarios</option>
          </select>
      

      <select style="margin-left: 25px;" name= "idLogin" id="idLogin">
                <option value="0">Participantes</option>
          </select>
          </div>

      <h5 class = "text-center "><?= form_submit('','Eliminar Asignacion',"class='btn btn-danger'")?>
	
	
   <?= form_close() ?></h5>
  
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
    /*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
    $(document).ready(function(){
       $("#idCuestionario").change(function () {
               $("#idCuestionario option:selected").each(function () {
                idCuestionario=$('#idCuestionario').val();
                $.post("<?php echo base_url('ControlComboBoxes/cuestionarioEncuestador()'); ?>", { idCuestionario: idCuestionario}, function(data){
                $("#idLogin").html(data);
                });            
            });
       })
    });
    /*fin de la funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
</script>
    
<p>&copy; Universidad Autonoma Metropolitana 2018 </p>
<!--Insertamos jQuery dependencia de Bootstrap-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!--Insertamos el archivo JS compilado y comprimido -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>