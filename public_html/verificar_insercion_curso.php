<?php
if(isset($_POST['nombre'])){
  session_start();
  $conexion; include_once("conexionSql.php");
  $sql = "SELECT id_area FROM area WHERE nombre = '".$_POST['area']."' LIMIT 1";
  $resultado = $conexion->query($sql);
  foreach ($resultado as $fila) {$id = $fila['id_area'];}
  $sql = "INSERT INTO curso(id_area, fecha_creacion, fecha_finalizacion, costo_minimo, nombre) VALUES ("
    . $id . ", '" . $_POST['FechaCreacion'] . "', '" . $_POST['FechaCulminar'] . "', '" . $_POST['costoMin'] . "', '" . $_POST['nombre'] . "')";
  $consultaTipo = $conexion->query($sql);
  $last_id = $conexion->insert_id;
  $sql = "INSERT INTO catedratico(id_curso, id_persona) VALUES ("
    . $last_id . ", " . $_SESSION['id'] . ")";
  $conexion->query($sql);
}
  header("location: principalCursos.php");
?>
