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
<header class="page-header">
	<ul class="nav nav-pills pull-right">
	<li class="active"><a href="#">Inicio</a></li>	
    <li class="active"><a href="#">Estudios en particular</a></li>
    <li class="active"><a href="#">Responder reactivos</a></li>
	</ul>
	 <h3>Wolfgang</h3>
</header>
</div>

<br>

<div class="jumbotron">
<h1 class = "text-center">Estudios asignados</h1>
<br>
<div class="center-block"> 
		<table class="table table-bordered">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Nombre</th>
			<th scope="col">Descripción</th>

		</tr>
	<tr>
<?php
if ($recuperar->num_rows() > 0)
{
    foreach ($recuperar->result() as $row ) 
    {
?>
	<tr>
		<td><?php echo $row->nombreEstudios; ?></td>
		<td><?php echo $row->descripcion; ?></td>
	</tr>
 <?php	
  }
}
else{
	?>
	<tr>
		<td> colspan="3">"No encontrada"</td>
	</tr>
	<?php
}
?>
</table>
</div>



<br>
			
<p>&copy; Universidad Autonoma Metropolitana 2018 </p>
 <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>

