<?= form_open("encuestador/recibirRespuesta") ?>
<?php
  $respuesta = array('name'=>'respuesta');  
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    </head>

    <body>

        <div class="container"><br>
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
            <h2 class = "text-left">Cuestionario </h2>
            <br>
                <div style="max-width: 90%" class="text-center">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Pregunta </th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            <tr>
                                <td><?php  echo $reactivo->pregunta; ?></td>
                            </tr>
                            <tr> 
                            <?php if($respuestas){

                                foreach($respuestas as $i){
                                    if($reactivo->idReactivo == $i->idReactivo){
                                        echo $i->respuesta;
                                    }
                                    
                                }
                            }else{
                                echo "No tiene respuestas";
                            } ?>      
                            </tr>
                        </tbody>
                    </table>
                <h5><?= form_submit('Contestar','Contestar',"class='btn btn-info'")?></h5>
            </div>
        </div><br>
    </div>
    <p>&copy; Eliseo Mirafuentes Martínez </p>
    <script type="text/javascript">
    $(document).ready(function(){
       $("#idReactivo").change(function () {
               $("#idReactivo option:selected").each(function () {
                idReactivo=$('#idReactivo').val();
                $.post("<?php echo base_url('ControlComboBoxes/reactivoRespuestaSelect'); ?>", { idReactivo: idReactivo}, function(data){
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

