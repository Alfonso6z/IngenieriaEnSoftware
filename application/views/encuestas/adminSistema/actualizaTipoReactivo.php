<?= form_open('/adminSistema/modificarTipoReactivo')?>
<?php
$nombre=array('name' => 'nombre','placeholder' => 'Modificar tipo de reactivo','maxlength'=>'20');
$rol = $this->session->userdata('rol');
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
?>
<html>
<head>
  <title>Modifica Usuario</title>
  <!-- Insertamos el archivo CSS compilado y comprimido -->
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
    		<h3 class = "text-center"> <strong>Modificar tipo de reactivo</strong></h3><br>
        <div class = "text-center">
          <h4>
            <select name= "tipoReactivo" id="tipoReactivo">
              <option value="select" selected>Tipo de reactivo a modificar</option>
              <?php
                foreach ($tiporeactivo as $i){
                   echo '<option value="'. $i->idTipoReactivo .'">'. $i->nombre .'</option>';
                 } 
              ?>
            </select>
            <div id = "campos">
                <td>
                  
                </td>
            </div>
          </h4>  
        </div><br>
    		<h5 class = "text-center"><?= form_submit('Actualizar','Actualizar',"class='btn btn-warning'")?>
		<?= form_close() ?></h5>
    </div>
    <div class="text-right">
      <p>&copy;Maribel Garcia Bautista</p>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
       $("#tipoReactivo").change(function () {
               $("#tipoReactivo option:selected").each(function () {
                tipoReactivo=$('#tipoReactivo').val();
                $.post("<?php echo base_url('ControlComboBoxes/llenarTipoReactivo'); ?>", { tipoReactivo: tipoReactivo}, function(data){
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