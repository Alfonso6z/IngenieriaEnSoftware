<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<!-- Insertamos el archivo CSS compilado y comprimido -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <!-- Theme opcional -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<title>Sistema de encuestador</title>
</head>

<body>

<div class="container">
<br>

<div class="jumbotron">
<h2 class = "text-center">Estudios asignados</h2>
<br>
<div class="text-center">
<div class="text">
		<table class="table table-bordered">
<?php
      foreach ($idEstudio as $i){ ?>
        <tr>
          <td> <?php echo  $i->nombre; ?></td>
        </tr>
<?php   }?>
</table>
</div>
</div>
</div>


<br>


<p>&copy; Eliseo Mirafuentes Martínez </p>
 <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>

