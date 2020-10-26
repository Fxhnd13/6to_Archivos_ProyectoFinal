<?php
?>
<div class="d-flex bd-highlight">
  <div class="w-75 bd-highlight">
    <h3>Fecha de Creacion:   <span class="badge badge-secondary"><?php echo $fila['fecha_creacion']; ?></span></h3>
    <h3>Fecha de Culminacion:    <span class="badge badge-secondary"><?php echo $fila['fecha_finalizacion']; ?></span></h3>
    <h2>Costo:    <span class="badge badge-secondary"><?php echo $fila['costo_minimo']; ?></span></h2>
    <small>Curso con id: <?php echo $fila['id_curso']; ?></small>
  </div>
  <div class="w-25 bd-highlight">
    <?php
      $sql2 = "SELECT * FROM Catedratico WHERE id_curso = '".$fila['id_curso']."'";
      $result = $conexion->query($sql2);
      foreach ($result as $catedratico) {
      if ($catedratico['id_persona'] == $_SESSION['id']) { ?>
      <form action="eliminar_curso.php" method="post">
        <input type="hidden" name="id_curso" value="<?php echo $fila['id_curso']; ?>">
        <button class="btn btn-lg btn-block btn-danger" type="submit" name="button">Eliminar Curso</button>
      </form>
    <?php }} ?> <!-- Aqui colocas si es maestro, el eliminar curso, si es alumno el poder inscribirse, y si ya esta inscrito el poder desincribirse -->
  </div>
</div>
