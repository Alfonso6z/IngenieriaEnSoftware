<?= form_open("adminEncuesta/recibirDatosseleccionPart") ?>
<html> 
  <head>
    <title>Seleccion de Participantes</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
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
          <h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong class = "text-center"><?php echo $error; ?></strong>
          </h5>
          <h5 class = "text-center"> <?= validation_errors('*');?></h5>
        </div> 
      <?php } ?>
      <?php if(isset($correcto)){?>
        <div class="alert alert-success alert-dismissible">
          <h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong class = "text-center"><?php echo $correcto; ?></strong>
          </h5>
          <h5 class = "text-center"> <?= validation_errors('*');?></h5>  
        </div>
      <?php } ?>
	    <h3 class = "text-center"><strong>Seleccionar participantes</strong></h3><br>
      <div class = "text-center">
        <h4>
          <select name= "idRol" id="idRol">
            <option  value="" selected >Selecciona Rol</option>
            <?php
              foreach ($roles as $i){
                  if($i-> idRol == "Encuestador" or $i-> idRol == "Analista")
                  echo '<option value="'. $i->idRol .'">'. $i->idRol .'</option>';
               } 
            ?>
          </select>&nbsp;&nbsp;
          <select name= "idLogin" id="idLogin">
            <option  value="" selected >Selecciona Usuario</option>
          </select>&nbsp;&nbsp;
          <select name= "idEstudio" id="idEstudio">
            <option value="0" >Selecciona Estudio</option>
              <?php
                foreach ($idEstudio as $i){
                  //if ($i->idTipoReactivo == 2){ 
                   echo '<option value="'. $i->idEstudio .'">'. $i->nombre .'</option>';
                  //}
                 } 
              ?>
          </select>&nbsp;&nbsp;
        </h4>
      </div><br>
      <h5 class = "text-center"><?= form_submit('','Aceptar',"class='btn btn-success'")?>
      <?= form_close() ?></h5>
    </div>
  <script type="text/javascript">
      /*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
      $(document).ready(function(){
         $("#idRol").change(function () {
                 $("#idRol option:selected").each(function () {
                  idRol=$('#idRol').val();
                  $.post("<?php echo base_url('ControlComboBoxes/rolUsuario'); ?>", { idRol: idRol}, function(data){
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