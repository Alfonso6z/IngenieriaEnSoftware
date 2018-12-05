<?= form_open("adminSistema/recibirDatosTipoReactivo") ?>
<?php
$nombre = array('name' => 'nombre','placeholder' => 'Tipo','maxlength'=>'50');
$rol = $this->session->userdata('rol');
$user = $this->session->userdata('user');
$apell = $this->session->userdata('apellido');
?>
<html>
	<head>
		<title>Alta tipo de reactivo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Insertamos el archivo CSS compilado y comprimido -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!-- Theme opcional -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<?php if(isset($error)){?>
					<div class="alert alert-danger alert-dismissible">
						<h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">		&times;</a><strong class = "text-center"><?php echo $error; ?></strong>
						</h5>
						<h5 class = "text-center"> <?= validation_errors('*');?>
						</h5>
					</div>
				<?php } ?>
				<?php if(isset($correcto)){?>
					<div class="alert alert-success alert-dismissible">
						<h5 class= "text-center"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong class = "text-center"><?php echo $correcto; ?></strong>
						</h5>
						<h5 class = "text-center"> <?= validation_errors('*');?>
						</h5>
					</div>
				<?php } ?>
				<h3 class = "text-center"><strong> Agregar tipo de reactivo </strong></h3><br>
				<h4 class = "text-center">
					<?= form_label('Tipo de reactivo: ', 'nombre') ?> <?= form_input($nombre)?>
				</h4><br>
				<h5 class = "text-center"><?= form_submit('aceptar','Aceptar',"class='btn btn-success'")?>
					<?= form_close() ?></h5>
			</div>
			<div class="text-left">
				<p>&copy;Valverde Cruz Marisol</p>
			</div>
		</div>
		<!--Insertamos jQuery dependencia de Bootstrap-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!--Insertamos el archivo JS compilado y comprimido -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</body>
</html>