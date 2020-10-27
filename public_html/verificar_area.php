<?php
if(isset($_POST['area'])){
  $conexion; include_once("conexionSql.php");
  $sql = "INSERT INTO area(nombre) VALUES ('" . strtoupper($_POST['area']) . "')";
  $conexion->query($sql);
}
header("location: principalCursos.php");
?>
