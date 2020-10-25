<?php 

  session_start(); 
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
  </head>
</head>
<body>
    <?php include("navBar.php"); ?>
    <h1>AQUÍ IRAN LOS CURSOOOOOS</h1>
</body>
</html>