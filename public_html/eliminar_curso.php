<?php
if(isset($_POST['id_curso'])){
  $conexion; include_once("conexionSql.php");
  $sql = "DELETE FROM Catedratico WHERE id_curso = ".$_POST['id_curso'];
  $result = $conexion->query($sql);
  $sql = "DELETE FROM Curso WHERE id_curso = ".$_POST['id_curso'];
  $result = $conexion->query($sql);
}
header("location: principalCursos.php");
?>
