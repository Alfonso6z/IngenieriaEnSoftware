<?= form_open('/encuestador/recibirRespuesta')?>
<?php
  $respuesta = array('name'=>'respuesta','placeholder' => 'Respuesta ','maxlength'=>'100','id'=>'respuesta' ,'onkeyup'=>"return validar(this.value,'boton')");  
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
    </script>

    <script type="text/javascript">
        function habilitar(){
            var radio = document.getElementById('idRespuesta').value;
            var boton = document.getElementById('boton');      
            if(radio){
                boton.disabled = false;
            }else{
                boton.disabled = true;
            }
        }
        function validar(val,btx){
            var boton = document.getElementById('boton');
            if (val==null || val=="") {
                boton.disabled = true;
            }else 
            if (val!=null || val!="") {boton.disabled = false;}
        }
    </script>
    </head>

    <body>

        <div class="container"><br>
            <div class>
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
                <div style="max-width: 90%" class="text-center">
                     <input type="hidden" name="idCuestionario" value="<?php echo $cuestionario[0]->idCuestionario;?>"><h3 class="text-left">Cuestionario : <?php echo $cuestionario[0]->cuenombre; ?></h3>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Pregunta </th>
                                <th class="text-center">Respuestas</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                    <?php if($reactivo){?>
                        <tbody class="text-left">
                            <tr>
                                <td class="text-center"><h4><strong><input type="hidden" name="reactivo" value="<?php echo $reactivo->idReactivo?>"><?php echo $reactivo->pregunta;?></strong></h4></td>
                            <td><table class="table table-hover">
                                <tbody class="text-left">
                            <?php 

                            if($reactivo->idTipoReactivo == "2"){?>
                                    <?php
                                    foreach ($respuestas as $i){
                                        if($reactivo->idReactivo==$i->idReactivo){
                                            echo "<tr><td class='text-center'><label><input type='radio' id='idRespuesta' name='idRespuesta' value = ".$i->respuesta." onchange = 'return habilitar();'></td><td>".$i->respuesta." </label></td></tr>";
                                        }
                                     } 
                                  ?></tbody></table></td>
                                    <?php   
            
                            }else{
                                ?><td class="text-center"><?= form_textarea($respuesta);?></td><?php
                            } ?>      
                            </tr>
                        </tbody>
                    <?php }else{
                        echo "<h1>Ya no hay preguntas<h1>";
                    } ?>
                    </table>
            </div>
        </div><br>
    </div>
    <div class="text-center"><?= form_submit('Guardar','Guardar',"id = 'boton' class='btn btn-success for='disabled' disabled name='boton'")?></div>
     <!--Insertamos jQuery dependencia de Bootstrap-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--Insertamos el archivo JS compilado y comprimido -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>

