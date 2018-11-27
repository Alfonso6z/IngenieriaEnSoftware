<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <title>Encuestador</title>
    <!-- Insertamos el archivo CSS compilado y comprimido -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Theme opcional -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  </head>
  <body>
      <div class="jumbotron">
        <div class="text-center">
        <h2>Estudios en Particular</h2>
      </div>
      <table class="table">
    <div class="container">
      <div class="jumbotron">
        <h2>Estudios en Particular</h2>
    
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Estudio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Tipo de respuesta</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>  
  <?php
      foreach ($idEstudio as $i){ ?>
        <tr>
          <td> <?php echo  $i->nombre; ?></td>
          <td> <?php echo  $i->descripcion; ?></td>
        </tr>
  <?php   }?>
    </tr>

  </tbody>
</table>

  </div>
    <p>&copy; Edgaro 2018</p>
  </div>
      
  </div>
   
    <!--Insertamos jQuery dependencia de Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Insertamos el archivo JS compilado y comprimido -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>