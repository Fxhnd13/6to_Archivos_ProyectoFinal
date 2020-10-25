<?php 
    session_start();
    $conexion; include_once('conexionSql.php');
    $sql = "SELECT * FROM persona WHERE correo_electronico='".$_GET['correo']."' LIMIT 1;";
  
    $resultado = $conexion->query($sql);
    $usuario;
    foreach($resultado as $fila) $usuario=$fila;
    
?>

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
  <div>
        <?php include("navBar.php"); ?>
                      
        <br><br>
        <div class="container card">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <h3>Nombre:  <?php echo $usuario['nombre']." ".$usuario['apellido']?></h3>
                        <h4>Tipo:  si es docente o si es estudiante </h4>
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
                                  <div class="card col-md-4">
                                    <br>
                                    <h6>Opciones:</h6><br>
                                    <ul>
                                      <li>
                                        <form action="CRUD Usuario/registroUsuario.php" method="post">
                                          <input type="text" name="correo" value="<?php echo $usuario['correo_electronico'] ?> " hidden></input>
                                          <button class="btn btn-link" type="submit" name="accion" value="editar">Editar Informacion</button>
                                        </form>
                                      </li>
                                      <li>
                                        <form action="CRUD Usuario/registroUsuario.php" method="post">
                                          <input type="text" name="correo" value="<?php echo $usuario['correo_electronico'] ?> " hidden></input>
                                          <button class="btn btn-link" type="submit" name="accion" value="eliminar">Eliminar Perfil</button>
                                        </form>
                                      </li>
                                    </ul>
                                  </div>
                                <?php } ?>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
  </body>
</html>
