<?= form_open('/codigofacilito/recibirDatos')?>
<?php
	$nombre=array(
		'name' => 'nombre','placeholder' => ' Usuario');
	$numero = array(
		'name' => 'numero','placeholder' => ' Password');
?>
<?=  form_label('Usuario: ','nombre') ?>
<?= form_input($nombre) ?>
<br><br> 
<?= form_label('Password: ','numero') ?>
<?= form_input($numero) ?>
<br><br>
<?= form_submit('','Registrar') ?>
<?= form_close() ?>
</body>
</html> 