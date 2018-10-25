<?= form_open('/encuestas/guardareactivos') ?>
<?php
  $var=site_url('encuestas/iniciaSesion',NULL);
?>
<html>
  <head>
    <title>Alta de reactivos</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <!-- Theme opcional -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  </head>
  <body>
    <div class="container">
      <header class="page-header">
        <ul class = "nav nav-pills pull-right">
          <li class = "active"><a href=" <?php echo $var; ?>">Inicio</a></li>
          <li class = "nav nav-pills pull-right"><a href="#">Regresar</a></li>
          <li><a href="#">Siguiente</a></li>
        </ul>
        <h3>Wolfgang</h3>
     </header>
        <div class="jumbotron">
        <h3 class = "text-center">Escribe tu pregunta</h3>
        <div class="form-group">
          <form action="" method="POST" ></form>
          <textarea required="TRUE" name="pregunta" rows="7" cols="83" ></textarea>
          <br><br>
          <div class="text-center"><button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        <?= form_close() ?></h5>
      </div>
    </div>
      <div class="text-right">
        <p>&copy;Valverde Cruz Marisol</p>
      </div>
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/boo>tstrap-datepicker.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!--Insertamos el archivo JS compilado y comprimido -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
     </script>
  </body>
</html>