<?= form_open("recibirDatos") ?>
<?php
 $nombre = array('name' => 'nombre','placeholder' => 'Nombre del estudio');
$descripcion = array('name' => 'descripcion','placeholder' => 'Descripción del estudio');
?>

<html>
<head><!-- Insertamos el archivo CSS compilado y comprimido -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <!-- Theme opcional -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
 </head>

<body>

<div class="container">
      <header class="page-header">
        <ul class = "nav nav-pills pull-right">
          <li class="active"><a href="#">Inicio</a></li>
        </ul>
        <h3>Wolfgang</h3>
      </header>

<div class="jumbotron">
<h1 class = "text-center">Alta Estudio</h1>
<h4 class = "text-center">
<?= form_label('Nombre: ', 'nombre') ?><br>
<?= form_input($nombre) ?>
<h4 class = "text-center">
<?= form_label('Descripción del estudio: ', 'descripcion')?><br>
<h3 class = "text-center"><?= form_textarea($descripcion) ?></h3>

</div>
<br>
<h5 class = "text-center"><?= form_submit('','Subir Estudio',"class='btn btn-danger'")?>
<?= form_close() ?>

<p>&copy; Universidad Autonoma Metropolitana 2018 </p>
<!--Insertamos jQuery dependencia de Bootstrap-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>