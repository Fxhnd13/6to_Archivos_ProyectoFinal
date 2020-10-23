<?php 

  $conexion = new mysqli("localhost","root","josecarlos","creatica");
  $sql = "SELECT nombre, apellido, correo_electronico, cui, id_persona FROM persona WHERE correo_electronico='".$_POST['correo']."' AND password='".$_POST['password']."' LIMIT 1;";

  $resultado = $conexion->query($sql);

  $columnas = $resultado->num_rows;
  session_start();
  if($columnas === 1){
    foreach($resultado as $fila) $usuario=$fila;
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['correo'] = $usuario['correo_electronico'];
    $_SESSION['apellido'] = $usuario['apellido'];
    header("location: perfil.php");
  }else{
    $_SESSION['mensajeError'] = "No se pudo iniciar sesion, credenciales incorrectas";
    header("location: error.php");
  }

?>