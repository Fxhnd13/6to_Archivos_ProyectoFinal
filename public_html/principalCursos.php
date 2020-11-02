<?php
  session_start();
  if(!isset($_SESSION['correo'])){
    $_SESSION['mensajeError'] = "Inicie sesión para poder acceder a la pagina web";
    header("location: error.php");
  }
  $resultado;
  $conexion; include_once("conexionSql.php");
    if(isset($_GET['consulta'])){//si hay una consulta miramos que tipo de consulta
      if($_GET['consulta'] === "todosLosCursos"){//listamos todos
        $sql = "SELECT * FROM curso";
        $resultado = $conexion->query($sql);
      }else if($_GET['consulta'] === "cursosAsignados"){//listamos los cursos que la session activa tenga asignados !! agregar el resultado a la variable $resultado
        $sql = "SELECT * FROM curso
        INNER JOIN registro ON curso.id_curso = registro.id_curso
        WHERE registro.id_persona = " . $_SESSION['id'] . "";
        $resultado = $conexion->query($sql);
      }else if($_GET['consulta'] === "cursosImpartidos"){//listamos los cursos que la session activa tenga para impartir
        $sql = "SELECT * FROM curso
        INNER JOIN catedratico ON curso.id_curso = catedratico.id_curso
        WHERE catedratico.id_persona = " . $_SESSION['id'] . "";
        $resultado = $conexion->query($sql);
      }else if($_GET['consulta'] === "cursoEspecifico"){//listamos los cursos con LIKE de la busqueda que haya realizado el usuario
        $sql = "SELECT * FROM curso WHERE nombre LIKE '%" . $_GET['nombreCurso'] . "%'";
        $resultado = $conexion->query($sql);
        //donde $_GET['nombreCurso'] tiene guardado el valor buscado por el usuario
      };
    }else{//si no se hizo una consulta listamos todos los cursos
      $sql = "SELECT * FROM curso";
      $resultado = $conexion->query($sql);
    }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Creatica</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel=StyleSheet HREF="Css/perfil.css" TYPE="text/css" MEDIA=screen>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->


  </head>
</head>
<body class="bg-secondary">
    <?php include_once("navBar.php"); ?>
    <div class="d-flex bd-highlight">
      <div class="p-2 w-75 bd-highlight">
        <div class="container">
          <?php /*echo $sql;*/ ?>
          <div class="accordion" id="accordionExample">
            <?php 
            if(($resultado->num_rows)>0){
              foreach ($resultado as $fila) { ?>
              <div class="card">
                <div class="card-header" id="heading<?php echo $fila['id_curso']; ?>">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $fila['id_curso']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $fila['id_curso']; ?>">
                      <h1><span class="badge badge-secondary"><?php echo $fila['nombre']; ?></span></h1>
                    </button>
                  </h2>
                </div>
                <div id="collapse<?php echo $fila['id_curso']; ?>" class="collapse show" aria-labelledby="heading<?php echo $fila['id_curso']; ?>" data-parent="#accordionExample">
                  <div class="card-body">
                    <?php include("tarjeta_curso.php"); ?>
                  </div>
                </div>
              </div>
            <?php }
            }else{
                if(isset($_GET['consulta'])){
                  if($_GET['consulta'] === "todosLosCursos"){//listamos todos ?>
                    <h2 class="text-white">No hay cursos registrados en el sistema </h2>
                  <?php }else if($_GET['consulta'] === "cursosAsignados"){//listamos los cursos que la session activa ?>
                    <h2 class="text-white">No tiene cursos asignados</h2>
                  <?php }else if($_GET['consulta'] === "cursosImpartidos"){//listamos los cursos que la session activa tenga ?>
                    <h2 class="text-white">No hay cursos a impartir</h2>
                  <?php }else if($_GET['consulta'] === "cursoEspecifico"){//listamos los cursos con LIKE de la busqueda que haya ?>
                    <h2 class="text-white">No se encontraron resultados para la busqueda realizada</h2>
                  <?php }
                }else{ ?>
                    <h2 class="text-white">No hay cursos registrados en el sistema </h2>
                <?php }
            }
            ?>
          </div>
        </div>
      </div>
      <div class="p-2 w-25 bd-highlight">
        <?php include("area.php"); ?>
      </div>
    </div>
    <?php include("modal-inscrito.php"); ?>



</body>
</html>