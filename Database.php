<?php
  // hay dos clases mysql mysqli
  //$conexion = new mysqli("servidor","usuario","clave","bd")
  $conexion = new mysqli("localhost","root","josecarlos","creatica");
  $sql = "SELECT nombre, apellido, correo_electronico, cui, id_persona FROM USER ";
  if(isset($_POST['buscar']))
    $sql.=" WHERE nombre LIKE '%".$_POST['buscar']."%' OR apellido LIKE '%".$_POST['buscar']."%' ";
  $sql.= " ORDER BY nombre";

  $resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Sitio del Laboratorio de Manejo e Implementación de Archivos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Listado de usuarios</h1>
      <form action="index.php" method="post">
        Escriba nombre o apellidos:
        <?php // if(isset($_POST['buscar'])) echo $_POST['buscar']; ?>
        <input type="text" name="buscar" id="buscar" value="<?php echo isset($_POST['buscar']) ? $_POST['buscar'] : ''; ?>">
        <input type="submit" value="Buscar">
        <a href="nuevo.php" class="btn btn-primary">Nuevo usuario</a>
      </form>
      <table class="table table-striped table-sm table-primary">
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo Electronico</th>
          <th>Acciones</th>
        </tr>
        <?php foreach ($resultado as $fila): ?>
          <tr>
            <td><?php echo $fila['idPersona'] ?></td>
            <td><?php echo $fila['nombre'] ?></td>
            <td><?php echo $fila['apellido'] ?></td>
            <td><?php echo $fila['correo_electronico'] ?></td>
            <td>
              <form action="editar.php" method="post">
                <input type="hidden" name="correo" value="<?php echo $fila['email'] ?>">
                <input type="submit" value="  Editar  " class="btn btn-sm btn-warning">
              </form>
              <form action="eliminar.php" method="post">
                <input type="hidden" name="correo" value="<?php echo $fila['email'] ?>">
                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger">
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </body>
</html>