<?php 
    session_start();
    $conexion; include_once('conexionSql.php');
    $sql = "SELECT * FROM persona WHERE correo_electronico='".$_GET['correo']."' LIMIT 1;";
  
    $resultado = $conexion->query($sql);
    $usuario;
    foreach($resultado as $fila) $usuario=$fila;
    $consultaTipo = $conexion->query("SELECT * FROM catedratico WHERE idPersona=".$usuario['id_persona'].";");
    $tipo;
    if(($consultaTipo->num_rows) > 0){
      $tipo = "Catedratico";
    }else{
      $tipo = "Estudiante";
    }
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel=StyleSheet HREF="Css/perfil.css" TYPE="text/css" MEDIA=screen>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
        <?php include("navBar.php"); ?>
                      
        <br><br>
        <div class="container card">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <h3>Nombre:  <?php echo $usuario['nombre']." ".$usuario['apellido']?></h3>
                        <h4>Tipo:  <?php echo $tipo ?> </h4>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-8">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Acerca de...</a>
                            </li>
                        </ul>
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <br>
                              <div class="row">
                                <div class="col-md-7">
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label>Id: </label>
                                      </div>
                                      <div class="col-md-7">
                                      <p><?php echo $usuario['id_persona'] ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label>Nombre(s): </label>
                                      </div>
                                      <div class="col-md-7">
                                          <p><?php echo $usuario['nombre'] ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label>Apellido(s): </label>
                                      </div>
                                      <div class="col-md-7">
                                      <p><?php echo $usuario['apellido'] ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label>Correo: </label>
                                      </div>
                                      <div class="col-md-7">
                                      <p><?php echo $usuario['correo_electronico'] ?></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label>Telefono: </label>
                                      </div>
                                      <div class="col-md-7">
                                      <p><?php echo $usuario['telefono'] ?></p>
                                      </div>
                                  </div>
                                </div>
                                <?php if($usuario['correo_electronico']===$_SESSION['correo']){ ?>
                                  <div class="col-md-4">
                                    <br>
                                    <h6>Opciones:</h6>
                                    <ul>
                                      <form action="registroUsuario.php" method="post">
                                          <input type="email" name="correo" value="<?php echo $usuario['correo_electronico'] ?>" hidden>
                                        <li>
                                            <button class="btn btn-link" type="submit" name="accion" value="editar">Editar Informacion</button>
                                        </li>
                                      </form>
                                      <li>
                                        <button class="btn btn-link" data-toggle="modal" data-target="#EliminarCuenta">Eliminar Perfil</button>
                                      </li>
                                      <li>
                                        <button class="btn btn-link" data-toggle="modal" data-target="#DarCurso">Dar curso</button>
                                      </li>
                                    </ul>
                                  </div>
                                <?php } ?>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>      
        </div>


        <div class="modal fade" id="EliminarCuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  ¿Esta seguro que desea eliminar su cuenta?
              </div>
              <div class="modal-footer">
                  <form action="accionUsuario.php" method="post">  
                    <div class="row justify-content-center">
                      <button name="accion" value="eliminar" class="btn btn-danger " type="submit">Eliminar</button>
                      <div class="col-sm-1"></div>
                      <button type="button" class=" btn btn-secondary" data-dismiss="modal">Cerrar</button>     
                      <div class="col-sm-1"></div>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="DarCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="accionUsuario.php" method="post">  
                <div class="modal-body">
                <select name="idCurso" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected value="-1">Elegir curso...</option>
                  <?php 
                    $resultado = $conexion->query("SELECT * FROM curso;");
                    foreach($resultado as $curso){
                  ?>
                    <option value="<?php echo $curso['id_curso'] ?>"><?php echo $curso['nombre'] ?></option>
                  <?php } ?>
                </select>
                </div>
                <div class="modal-footer">
                  <div class="row justify-content-center">
                      <button name="accion" value="docente" class="btn btn-dark " type="submit">Dar curso</button>
                      <div class="col-sm-1"></div>
                      <button type="button" class=" btn btn-secondary" data-dismiss="modal">Cerrar</button>     
                      <div class="col-sm-1"></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        

  </body>
</html>