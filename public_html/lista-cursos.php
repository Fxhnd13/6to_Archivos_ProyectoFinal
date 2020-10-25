<?php
    //if($_SESSION['id']!=null && isset($_SESSION['id'])){
        if(!isset($_GET['busqueda'])){
        $sql1 = "SELECT * FROM curso ORDER BY nombre;";
        $listaCursos = $conexion->query($sql1);
        $cont = 1;
        }else{
            $sql1 = "SELECT * FROM curso WHERE nombre LIKE '%".$_GET['nombreCurso']."%' ORDER BY nombre;";
            $listaCursos = $conexion->query($sql1);
            $cont = 1;
        }
    /*}else{
        header("location: ../index.php");
    }*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel=StyleSheet HREF="Css/login.css" TYPE="text/css" MEDIA=screen>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <title>Lista de Cursos</title>
</head>
<body>

    <div class="container h-100">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Curso</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Finaliza</th>
                <th scope="col">Costo Minimo</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaCursos as $fila): ?>
                <tr>
                <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['fecha_creacion'] ?></td>
                <td><?php echo $fila['fecha_finalizacion'] ?></td>
                <td>Q <?php echo $fila['costo_minimo'] ?></td>
                <td>
                    <form action="perfil-curso.php" method="post">
                        <input type="hidden" name="id_curso" value="<?php echo $fila['id_curso'] ?>">
                        <input type="submit" value="  Ver " class="btn btn-sm btn-warning">
                    </form>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    
    </div>
</body>
</html>