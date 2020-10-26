<?php
if(isset($_POST['area'])){
  $conexion; include_once("conexionSql.php");
  $sql = "INSERT INTO Area (id_area, nombre) VALUES (0, '" . $_POST['area'] . "')";
  if(!$conexion->query($sql)) echo "hola";
}
header("location: principalCursos.php");
?>
