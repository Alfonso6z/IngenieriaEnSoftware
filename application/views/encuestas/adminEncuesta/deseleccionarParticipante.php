<?= form_open("adminEncuesta/recibirDatosdeseleccionPart") ?>
<html> 
<head><!-- Insertamos el archivo CSS compilado y comprimido -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <!-- Theme opcional -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>

<body>
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
	
	
   <?= form_close() ?></h5>
  
</div>

    
<p>&copy; Universidad Autonoma Metropolitana 2018 </p>
<!--Insertamos jQuery dependencia de Bootstrap-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!--Insertamos el archivo JS compilado y comprimido -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>