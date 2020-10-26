<?php
  $conexion; include_once("conexionSql.php");
  $sql = "SELECT nombre FROM Area";
  $resultado = $conexion->query($sql);
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ingresar Curso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body class="bg-secondary">
    <ul class="nav nav-tabs bg-dark">
      <div class="container" style="height: 60px;">
      </div>
    </ul>
    <div class="container">
      <p></p>
      <form action="verificar_insercion_curso.php" method="post">
        <div class="form-group">
          <label for="costoMin">Costo Minimo</label>
          <input type="text" class="form-control" id="costoMin" name="costoMin" aria-describedby="costoMinHelp" required>
          <small id="costoMinHelp" class="form-text text-muted">Costo minimo que tendra el curso.</small>
        </div>
        <input type="hidden" name="FechaCreacion" value="<?php echo date("Y-m-d"); ?>">
        <div class="form-group">
          <label for="FechaCulminar">Fecha de Culminacion</label>
          <input type="date" class="form-control" id="FechaCulminar" name="FechaCulminar" aria-describedby="FechaCulminarHelp" required>
          <small id="FechaCulminarHelp" class="form-text text-muted">Fecha de Culminacion del curso.</small>
        </div>
        <div class="form-group">
          <label for="nombre">Nombre del Curso</label>
          <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" required>
          <small id="nombreHelp" class="form-text text-muted">Nombre que tendra el curso a impartir.</small>
        </div>
        <div class="form-group">
          <label for="selectArea">Area</label>
          <select class="form-control" name="area" id="selectArea">
            <?php foreach ($resultado as $fila) { ?>
              <option><?php echo $fila['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>
        <button type="submit" name="btn" class="btn btn-lg btn-block btn-warning">Ingresar Curso</button>
      </form>
    </div>
  </body>
</html>
