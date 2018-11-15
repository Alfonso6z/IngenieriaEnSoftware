<?php
$rol = $this->session->userdata('rol');
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
$cerrarSesion=site_url('login/logout',NULL);
$inicio=site_url('adminEncuesta',NULL);
?>
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


<br>

<div class="jumbotron">
<h2 class = "text-center">Estudios asignados</h2>
<br>
<div class="text-center">
<div class="text">
		<table class="table table-bordered">
		<thead class="thead-dark">
		<tr>
			<th class="text-center"scope="col">Nombre</th>
			<th class="text-center"scope="col">Descripción</th>

		</tr>
	
</thead>
		 <?php
              foreach ($idEstudio as $i){ ?>
              	<tr>
                 <td> <?php echo  $i->nombre; ?></td>
                 <td> <?php echo $i->descripcion;?></td>
            </tr>
            <?php   } 

            ?>
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

