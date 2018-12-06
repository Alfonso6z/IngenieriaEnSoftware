<?= form_open('/AdminEncuesta/modificarReactivo')?>
<?php
$pregunta=array('name' => 'pregunta','placeholder' => 'Escriba la pregunta nuevamente','maxlength'=>'100');
?>
<html>
<head>
  <title>Modifica Reactivo</title>
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
        <h3 class = "text-center"><strong> Modificar reactivo </strong> </h3><br>
          <div class="text-center">
            <h4>
             <select name= "idEstudio" id="idEstudio">
              <option value="0" >Estudio</option>
              <?php
                foreach ($estudio as $i){
                   echo '<option value="'. $i->idEstudio .'">'. $i->nombre .'</option>';
                 } 
              ?>
              </select> &nbsp; &nbsp;
              <select id="idCuestionario" name="idCuestionario">
                <option value="0">Cuestionario</option>
              </select>&nbsp; &nbsp;
              <select id="idReactivo" name="idReactivo">
                <option value="0">Pregunta</option>
              </select>
              <div id = "campos">
                <td>
                  
                </td>
              </div>
            </h4>
          </div><br>
        <h5 class = "text-center"><?= form_submit('Actualizar','Actualizar',"class='btn btn-warning'")  ?> 
        </h5>
    <?= form_close() ?>
    </div>
    <div class="text-left">
      <p>&copy; Valverde Cruz Marisol</p>
    </div>
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
    <script type="text/javascript">
    $(document).ready(function(){
       $("#idReactivo").change(function () {
               $("#idReactivo option:selected").each(function () {
                idReactivo=$('#idReactivo').val();
                $.post("<?php echo base_url('ControlComboBoxes/llenarReactivo'); ?>", { idReactivo: idReactivo}, function(data){
                $("#campos").html(data);
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