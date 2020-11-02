<?php
  session_start();
  $conexion; include_once('conexionSql.php');
  $sql = "SELECT * FROM persona WHERE correo_electronico='".$_POST['correo']."' AND password='".$_POST['password']."' LIMIT 1;";

  $resultado = $conexion->query($sql);
  $columnas = $resultado->num_rows;
  if($columnas == 1){
    foreach($resultado as $fila) $usuario=$fila;
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['correo'] = $usuario['correo_electronico'];
    $_SESSION['apellido'] = $usuario['apellido'];
    $_SESSION['cui'] = $usuario['cui'];
    $_SESSION['id'] = $usuario['id_persona'];
    $_SESSION['telefono'] = $usuario['telefono'];
    header("location: principalCursos.php");
  }else{
    $_SESSION['mensajeError'] = "No se pudo iniciar sesion, credenciales incorrectas";
    header("location: error.php");
  }

?>