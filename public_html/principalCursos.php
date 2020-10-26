<?php 

  session_start(); 
  //$conexion; include_once('conexionSql.php');
  if(isset($_GET['consulta'])){//si hay una consulta miramos que tipo de consulta

    if($_GET['consulta'] === "todosLosCursos"){//listamos todos

    }else if($_GET['consulta'] === "cursosAsignados"){//listamos los cursos que la session activa tenga asignados

    }else if($_GET['consulta'] === "cursosImpartidos"){//listamos los cursos que la session activa tenga para impartir

    }else if($_GET['consulta'] === "cursoEspecifico"){//listamos los cursos con LIKE de la busqueda que haya realizado el usuario
      //donde $_GET['nombreCurso'] tiene guardado el valor buscado por el usuario
    }
  }else{//si no se hizo una consulta listamos todos los cursos

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </head>
</head>
<body>
    <?php include("navBar.php"); ?>
    <h1 class="container h-100">Lista de Cursos</h1>
    <?php include("lista-cursos.php"); ?>

    <?php include("modal-inscrito.php"); ?>

    
    
</body>
</html>