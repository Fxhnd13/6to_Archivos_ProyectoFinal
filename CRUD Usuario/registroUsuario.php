<?php
  
  if(isset($_POST['correo']))
  {
    $conexion = new mysqli("localhost","root","josecarlos","labmia");
    $sql = "SELECT * FROM USER WHERE email = '".$_POST['correo']."' LIMIT 1";
    $resultado = $conexion->query($sql);
    foreach($resultado as $fila) $usuario=$fila;
  }
  
?>

  <!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Editar usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <h1 class="text-center"><?php echo ((isset($usuario))? "Editar Usuario" : "Crear Usuario") ?></h1>
        <form action="accionUsuario.php" method="post">
            <input hidden type="email" name="correoViejo" value="<?php echo ((isset($usuario))? $usuario['correo'] : "") ?>">
            <?php if(!isset($usuario)){ ?>
                <label for="cui">Cui: </label>
                <input class="form-control" type="password" name="cui" value="" required>
            <?php } ?>
            <label for="nombre">Nombre: </label>
            <input class="form-control" type="text" name="nombre" value="<?php echo ((isset($usuario))? $usuario['nombre'] : "") ?>" required>
            <label for="apellido">Apellido: </label>
            <input class="form-control" type="text" name="apellido" value="<?php echo ((isset($usuario))? $usuario['apellido'] : "") ?>" required>
            <label for="correo">E-mail: </label>
            <input class="form-control" type="email" name="correo" value="<?php echo ((isset($usuario))? $usuario['correo'] : "") ?>" required>
            <label for="password1">Contraseña: </label>
            <input class="form-control" type="password" name="password1" value="<?php echo ((isset($usuario))? $usuario['password'] : "") ?>" required>
            <label for="password2">Confirmar contraseña: </label>
            <input class="form-control" type="password" name="password2" value="<?php echo ((isset($usuario))? $usuario['password'] : "") ?>" required>
            <label for="telefono">Telefono: </label>
            <input class="form-control" type="number" name="telefono" value="<?php echo ((isset($usuario))? $usuario['telefono'] : "") ?>" required>
            <br>
            <div class="text-center">
                <input class="btn btn-primary" name="accion" type="submit" value="<?php echo ((isset($usuario))? "editar" : "crear") ?>">
            </div>
        </form>
        </div>
    </div>

  </body>
</html>